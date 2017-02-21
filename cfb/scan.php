<?php
$path = "/path/to/folder";
$dirname = end(explode('/',$path));
// Run the recursive function 
$response = scan($path,$dirname);
function getFileExtension($path) { 
  $ext = pathinfo($path, PATHINFO_EXTENSION); 
  return $ext; 
}
// This function scans the files folder recursively, and builds a large array
function scan($path,$dirname){
  $files = array();
  // Is there actually such a folder/file?
  if(file_exists($path)){
    foreach(scandir($path) as $f) {
      if(!$f || $f[0] == '.') {
        continue; // Ignore hidden files
      }
      if(getFileExtension($f)=='php') {
        continue; // Ignore php
      }
      if(is_dir($path . '/' . $f)) {
        // The path is a folder
        $files[] = array(
          "name" => $f,
          "type" => "folder",
          "path" => $dirname.'/' .$f,
          "items" => scan($path.'/'.$f, $dirname.'/'.$f) // Recursively get the contents of the folder
        );
      }
      else {
        // It is a file
        $files[] = array(
          "name" => $f,
          "type" => "file",
          "path" => $dirname.'/'.$f,
          "size" => filesize($path.'/'.$f) // Gets the size of this file
        );
      }
    }
  }
  return $files;
}
// Output the pathectory listing as JSON
header('Content-type: application/json');
echo json_encode(array(
  "name" => $dirname,
  "type" => "folder",
  "path" => $dirname,
  "items" => $response
));
