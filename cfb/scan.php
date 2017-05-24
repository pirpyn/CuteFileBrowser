<?php

$path = realpath("/absolute/or/relative/path/to/files");
$ext_to_exclude = array('php','html','.htacces');

$dirname = end(explode('/',$path));

// Run the recursive function 
$response = scan($path,$dirname);

function cmprExtension($file,$exts) {
  $file_ext = pathinfo($file, PATHINFO_EXTENSION);
  foreach ($exts as $ext) {
    if ($file_ext === $ext) {
      return TRUE;
    }
  }
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
      if(cmprExtension($f,$ext_to_exclude)) {
        continue; // Ignore some extensions
      }
      if(is_dir($path . '/' . $f)) {
        // The path is a folder
        $files[] = array(
          "name" => $f,
          "type" => "folder",
          "path" => $dirname.'/'.$f,
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
// Output the listing as JSON
header('Content-type: application/json');
echo json_encode(array(
  "name" => $dirname,
  "type" => "folder",
  "path" => $dirname,
  "items" => $response
));
?>
