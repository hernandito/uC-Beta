<?php
/* unCommander — "What's using space here": one walk of the folder, adding up every file into its
 * folder and all the folders above it. Each folder keeps its sub-folders and its 60 biggest files
 * (the rest as one "smaller files" total), so the map and list can go in and out instantly.
 * Started detached; progress in the scan's JSON file, the result in its .tree file. */
require_once __DIR__ . '/lib.php';

$id = $argv[1] ?? '';
if (!preg_match('/^[a-z0-9]{6,32}$/', $id)) exit(1);
$file = UC_STATE . "/scans/$id.json";
$st = json_decode((string)@file_get_contents($file), true);
if (!$st) exit(1);
$stop = false;
pcntl_async_signals(true);
pcntl_signal(SIGTERM, function () use (&$stop) { $stop = true; });
function save(array $st): void { global $file; file_put_contents("$file.tmp", json_encode($st, JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE)); rename("$file.tmp", $file); }
$st['pid'] = getmypid(); $st['state'] = 'running'; $st['seen'] = 0; $st['bytes'] = 0; save($st);

$root = $st['root'];
/* folder rel => [bytes, files, sub-folder names, biggest files [name => bytes], smaller files [bytes, count]] */
$D = ['' => [0, 0, [], [], [0, 0], [0, 0, 0, 0, 0]]];
$last = 0;
$h = popen('find -H ' . escapeshellarg($root) . ' -mindepth 1 -printf ' . escapeshellarg('%y\t%s\t%P\0') . ' 2>/dev/null', 'r');
$buf = '';
while ($h && !feof($h) && !$stop) {
  $buf .= fread($h, 1 << 16); $parts = explode("\0", $buf); $buf = array_pop($parts);
  foreach ($parts as $e) {
    $a = explode("\t", $e, 3); if (count($a) < 3) continue;
    [$t, $size, $rel] = $a; $size = (int)$size;
    $i = strrpos($rel, '/'); $par = $i === false ? '' : substr($rel, 0, $i); $name = $i === false ? $rel : substr($rel, $i + 1);
    if ($t === 'd') {
      $D[$rel] ??= [0, 0, [], [], [0, 0], [0, 0, 0, 0, 0]];
      $D[$par] ??= [0, 0, [], [], [0, 0], [0, 0, 0, 0, 0]];
      $D[$par][2][] = $name;
      continue;
    }
    $D[$par] ??= [0, 0, [], [], [0, 0], [0, 0, 0, 0, 0]];
    $kind = preg_match('/\.(mkv|mp4|m4v|avi|mov|wmv|ts|m2ts|webm|mpe?g|iso|vob)$/i', $name) ? 0 : (preg_match('/\.(mp3|flac|m4a|aac|ogg|opus|wav|wma|aiff?|ape|dsf)$/i', $name) ? 1
      : (preg_match('/\.(jpe?g|png|gif|webp|heic|tiff?|bmp|raw|cr2|nef|arw|dng)$/i', $name) ? 2 : (preg_match('/\.(zip|rar|7z|tar|gz|xz|bz2|zst|img|qcow2|vdisk)$/i', $name) ? 3 : 4)));
    $f = &$D[$par][3]; $f[$name] = $size;
    if (count($f) > 120) { arsort($f); $rest = array_slice($f, 60, null, true); $f = array_slice($f, 0, 60, true); $D[$par][4][0] += array_sum($rest); $D[$par][4][1] += count($rest); }
    unset($f);
    /* up the tree: this folder and every one above it */
    $p = $par;
    while (true) { $D[$p][0] += $size; $D[$p][1]++; $D[$p][5][$kind] += $size; if ($p === '') break; $j = strrpos($p, '/'); $p = $j === false ? '' : substr($p, 0, $j); $D[$p] ??= [0, 0, [], [], [0, 0], [0, 0, 0, 0, 0]]; }
    $st['seen']++; $st['bytes'] += $size;
  }
  if (microtime(true) - $last > 0.5) { $last = microtime(true); save($st); }
}
if ($h) pclose($h);
foreach ($D as &$d) { if (count($d[3]) > 60) { arsort($d[3]); $rest = array_slice($d[3], 60, null, true); $d[3] = array_slice($d[3], 0, 60, true); $d[4][0] += array_sum($rest); $d[4][1] += count($rest); } }
unset($d);
file_put_contents(UC_STATE . "/scans/$id.tree", json_encode($D, JSON_UNESCAPED_SLASHES | JSON_INVALID_UTF8_SUBSTITUTE));
$st['state'] = $stop ? 'stopped' : 'done'; $st['finished'] = time(); $st['dirs'] = count($D);
save($st);
