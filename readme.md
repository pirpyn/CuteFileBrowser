# Cute File Browser

This is a fork of [TutorialZine CuteFileBrowser](http://tutorialzine.com/2014/09/cute-file-browser-jquery-ajax-php/)
It was created to give full liberty over folder's path.

You can see it in action at [this website](https://lamacs.fr/browse)

## How to :
Upload all files wherever you want on your server let's assume it is in `/opt/cfb` 
Assuming you want to display the folder `/files`.
1. Move `index.html` to `/files` 
2. Change 
..1. `path/to/folder` in `cfb/scan.php` to `/files`
..2. `cfb/styles.css` in `cfb/styles.css` to `/opt/cfb/styles.css`
..3. `cfb/script.js` in `cfb/script.js` to `/opt/cfb/styles.css`

Calling http://domain.ext/files will show the explorer.

## Summary of the fork
* Before : the folder had to be at the same level as `scan.php` (so you have to add scan.php and index.html to that folder). All file were shown (execpt files starting with a dot).
* After : the folder can be anywhere on the server. Some files can be excluded.
