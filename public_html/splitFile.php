<?php

$choppedPress_cmd = "/home/wxrsplitter/wxrsplitter.getsource.net/choppedPress.py";
$output_path = "/home/wxrsplitter/wxrsplitter.getsource.net/tmp/";

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />";
  echo "Type: " . $_FILES["file"]["type"] . "<br />";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
  echo "Stored in: " . $_FILES["file"]["tmp_name"];
  }

$fileToConvert = $_FILES["file"]["tmp_name"];


// Add Default file to Convert for testing
if ( !$fileToConvert ) {
	$fileToConvert = "/home/wxrsplitter/testFile.xml";
}

$commandToRun = "python $choppedPress_cmd  -i  $fileToConvert -o $output_path$fileToConvert";

echo "Running $commandToRun ...";
$output = shell_exec( $commandToRun );

echo $output;

?>
