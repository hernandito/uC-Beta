# unCommander (Beta)

### The two-pane file manager unRAID always deserved: fast, safe, and built for real libraries.

unCommander puts a Midnight Commander–style, two-pane file manager right inside the unRAID webGUI. It works just as well with a mouse, a keyboard or an iPad. Folders open instantly, even with tens of thousands of files. Every change can be undone, and nothing is ever deleted without a way back.

This is the **beta channel**. It has everything that's coming to the stable release, and you get it first.

<!-- Screenshots: put them in a screenshots/ folder and remove the comment marks below.
![unCommander](screenshots/main.png)
-->

---

## ⚠️ Before you install

- **The beta isn't in Community Applications.** You install it from this repo's link (see below).
- **It replaces the stable unCommander** if you have it, because it's the same plugin with a newer version. Your settings, shortcuts, trash and History are kept.
- **Going back to stable:** remove the beta in **Plugins**, then install unCommander from Community Applications again. Nothing you've saved is lost.
- Found a bug or have an idea? Post it in the [support thread](https://forums.unraid.net/topic/200949-plugin-uncommander-%E2%AD%90-a-powerful-two-pane-file-manager/). Betas get better fast because of your reports.

## Install

1. In unRAID, go to **Plugins → Install Plugin**.
2. Paste this link and click **Install**:

   ```
   https://raw.githubusercontent.com/hernandito/uC-Beta/main/uncommander.plg
   ```
3. Open **unCommander** from the unRAID top menu bar.

New betas show up in **Plugins → Check for Updates** like any other plugin.

**Requirements:** unRAID 6.12 or later. Optional parts (7-Zip, HEIC support, ffmpeg for video) download by themselves from their official sources and are checked against pinned checksums.

---

## ✨ What's new since 2026.10.18h

This beta is the biggest update unCommander has had. Here are the highlights.

### ↶ Undo anything, and see everything
- **History:** every rename, move, copy, delete, new folder and permission change is recorded. You can undo any step, or just part of one, even days later.
- **Honest undo:** before anything is replaced, uC tells you exactly how far it can be undone.
- **One retention setting:** "Keep deleted items and History for N days" (7 by default), plus *Empty the trash now* and *Forget all steps*.

### 🖱️ Works the way your hands already do
- **Right-click menu** on everything: rows, empty space and the path bar. On the iPad, press and hold.
- **Copy, Cut and Paste** with Ctrl+C / X / V, and a Paste window that shows what will happen first.
- **Drag and drop** between panes or onto a folder. **Drop files from your computer** to upload them. **Download** any file, or a whole selection as one zip.
- **The cart:** collect files from several folders, then copy or move them all in one go. **Tag for delete** builds a delete list the same way.
- **Folder tree:** an optional caret opens folders right inside the list.

### 🆕 Make it yours (new in this beta)
- **F-keys your way:** pick the *Windows / Midnight Commander* layout (F2 = Rename, F3 = View, F4 = Edit), keep unCommander's own, or set every key yourself.
- **Filter as you type:** a click on the icon in the Jump box switches between *jump to a name* and *show only matching names*.
- **Right-click to tick:** right-click ticks a row, right-drag ticks a run, and holding the button opens the menu (Total Commander style).
- **Hide the button bar** for more room. The F-keys keep working.
- **See what just changed:** files and folders changed in the last 5, 15 or 60 minutes (or a day) get their names in green.
- **Colour themes:** unCommander blue, unRAID orange, Graphite, Mono, Teal, Violet, Forest and the classic Midnight Commander look. Edit any colour for light and dark, and save your own themes.
- **A steadier frame:** the active pane no longer gets narrower when you click into it.

### 🖼️ Pictures, video and music, right in the panes
- **Gallery view** with a preview pane: picture thumbnails, plus video and audio you can scrub through.
- **Picture editor:** rotate, flip, crop (with shapes), straighten, resize, and save as JPG, PNG, WebP or GIF. JPG turns are lossless, and you can save as new or replace (undoable).
- **HEIC photos** from iPhones open and convert in any browser.
- **Play almost any video** in the browser, including on the iPad. Sound is converted on the fly, and there's subtitle support (inside the file or next to it, including PGS/DVD), track picking, sound sync, and picture conversion on the CPU, NVIDIA or Intel/AMD.
- **Music library view:** artists and albums with covers, an album strip with Play and Tags, and disc folders (CD1/CD2) handled for you.
- **Tag editor** with a MusicBrainz lookup. You review everything before it's written, and every write is checked. It also makes folder covers.
- **Player in the bottom bar** with a queue, shuffle, repeat, media keys, and resume where you left off.
- **Playlist builder:** add songs, albums or whole artists, reorder, then **Send** to Plex, Kodi (including smart playlists), Jellyfin/Emby, Navidrome, Airsonic or a USB drive. Sends are remembered and updated in one go.
- **Music check tool:** finds missing covers, mixed formats, missing tracks and empty albums. It can make covers, merge discs, rename to the tags and keep one format. It can also **ask Lidarr** to fetch what's missing.

### 💻 A real terminal, built in
- unRAID's own web terminal sits under the panes, as wide as both. **Hide** keeps it running.
- Clickable folder names, a **paste w/ edit** box, **clear** that keeps your scrollback, a session that survives a page reload, and an automatic reconnect when you come back to the app.

### 🧰 Tools that clean up for real
- **Duplicates:** two kinds. *Duplicate files on different disks* finds the copies your shares hide. *Identical files anywhere* is a byte-for-byte content match. It can tick for you ("Tick the hidden copies", or "Keep one, tick the rest" with a rule you choose), shows which copy is kept in green, and deletes now-empty folders along with them.
- **What's using space:** a map and a list, biggest first.
- **Empty folders**, **Movie folders without a video** (with Radarr) and **TV shows with missing episodes** (with Sonarr).
- **Clean up:** see what unCommander itself keeps, and clear it.
- **Fix access:** one click so shares and Docker apps can open a file (nobody:users).
- **User Scripts** button: run your User Scripts from the top bar.
- **Unassigned Devices:** mount and unmount drives and network shares right from the panes.

### 🗂️ Tabs, windows and the iPad
- **Tabs:** each keeps its own panes and name. They can live inside unRAID, in their own browser tab, or in an application window.
- **unCommander in its own tab**, without the unRAID header. On the iPad, *Share → Add to Home Screen* turns it into an app.
- Touch improvements throughout: a floating menu by your finger, bigger tap targets, and no accidental text selection.

### 🛡️ Safer than ever
- **Practice mode** is on for new installs. You can explore without being able to break anything, and switch it off when you're ready.
- **Gentle on your flash drive:** lists, History and ffmpeg live in unCommander's folder on the array. Little is written to the flash drive.
- **Array stopped?** uC says so clearly and keeps working where it safely can.

---

## Quick tour

| Do this | How |
|---|---|
| Open a folder | Click its name or press Enter. On a tablet, tap once to pick and again to open. |
| Go up | `..`, Backspace, or tap any part of the path bar |
| Switch pane | Click it, or press Tab. The active pane sets the direction (Copy → or ← Copy). |
| Tick | The checkbox, Space/Insert, Shift-click for a range, All / None / Invert, a pattern like `*.bak`, or right-click (if switched on) |
| Find a name | Just start typing. It jumps to the name, or filters the list in filter mode. |
| Menu | Right-click, or press and hold on a tablet. The Menu key and Shift+F10 work too. |
| Copy / Move | F5 / F6, drag and drop, or Ctrl+C / Ctrl+X then Ctrl+V |
| Rename | F4 (or F2 with the Windows / MC layout) |
| View / Edit | F2 / F3 (or F3 / F4 with the Windows / MC layout) |
| New folder · Delete · Find · Permissions | F7 · F8 or Del · F9 · F10 |
| Undo | Ctrl+Z, the Undo link in each message, or History for any earlier step |

Every key is listed in **Settings → Keyboard**, and the list follows your F-key layout.

### Good to know
- **Instant listings:** uC reads names first and only fetches sizes and dates for the rows on screen.
- **Background jobs:** copies and moves run as jobs, even if you close the tab. You get a row at the top of uC when one finishes, plus an unRAID notification.
- **Trash:** deleting moves items into `.uncommander-trash` at the top of the share or disk. Open it to Restore anything to where it came from. Old items are cleared daily.
- **Compare:** tags what's missing, newer or older between the two panes. *Detailed compare* goes all the way down through subfolders.
- **Compress / Extract:** .zip, .tar.gz, .rar (incl. RAR5), .7z and more, with real progress.
- **Batch rename:** replace, add, number or change case, with a live before → after preview.
- **Folder sizes, Disk column** (which disk each item really lives on), and **Back / Forward** per pane.
- **Colour highlighting** in View and Edit for unRAID configs, scripts, XML/.nfo, JSON, YAML, logs, PHP, JS and more.

## Settings at a glance

- **General:** menu name and entry, own tab, tab row, button bar, *mark what changed lately*, folder tree, video and music player, auto-refresh, touch behaviour.
- **Shortcuts:** buttons under the top bar for your favourite folders.
- **Look & sound:** colour themes, text size, your own CSS (with live preview, examples and a full variable reference), highlighting, sounds.
- **Safety & trash:** Practice mode, trash on/off, days to keep deleted items and History, where History is kept.
- **Tools:** all the tools above, plus the Radarr, Sonarr and Lidarr connections.
- **Keyboard:** F-key layout, typing jumps or filters, right-click menu or ticks, and the full key list.

Settings that suit one device (button bar, F-keys, typing, right-click, text size) are kept in that browser. The rest is saved on the server, so it's the same everywhere.

## Safety

- Only `/mnt` and `/boot` are reachable unless you turn on the Whole OS view yourself.
- uC refuses to copy or move something onto itself through another view (for example `/mnt/cache/Media/x` onto `/mnt/user/Media`), and won't move a folder into itself.
- Existing files are **skipped** by default. You choose per operation, and anything replaced is set aside in the trash first.
- Jobs run one at a time, in order, and survive a closed tab.

## Building from source

The source lives in `src/`, laid out like the paths on the server. Run:

```
UC_VERSION=2026.11.01-r130 \
UC_PLUGIN_URL=https://raw.githubusercontent.com/hernandito/uC-Beta/main/uncommander.plg \
python3 build.py
```

This writes `uncommander.plg`, one self-contained file with everything inlined. `CHANGES.txt` becomes the change list shown in unRAID's Plugins page.

---

Made by **hernandito**. If unCommander saves you time, a ⭐ on the repo and a note in the forum thread are always appreciated.
