# Cute File Browser

This is a fork of [TutorialZine CuteFileBrowser](http://tutorialzine.com/2014/09/cute-file-browser-jquery-ajax-php/)
It was created to give full liberty over folder's path.

## How to :
Upload all files wherever you want on your server. 
Assuming you want to display some `/path/to/dir` folder. Then change `$path$` variable in `scan.php` according to that path.
You may also want to update path to `js` ans `css` files

Calling http://domain.ext/path/to/index.html will will show the browser

## Summary of the fork
* Before : the folder had to be at the same level as `scan.php`. All file were shown (execp files strating with a dot.
* After : the folder can be anywhere on the server. Some files can be excluded.
