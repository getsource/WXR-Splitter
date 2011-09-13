<?php

$CHOPPEDPRESS_CMD = "/home/wxrsplitter/wxrsplitter.getsource.net/choppedPress.py";
$OUTPUT_PATH = "/home/wxrsplitter/wxrsplitter.getsource.net/public_html/splitFiles/";

if ($_FILES["file"]["error"] > 0)
  {
  echo "Error: " . $_FILES["file"]["error"] . "<br />\n";
  }
else
  {
  echo "Upload: " . $_FILES["file"]["name"] . "<br />\n";
  echo "Type: " . $_FILES["file"]["type"] . "<br />\n";
  echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Mb<br />\n";
  echo "Stored in: " . $_FILES["file"]["tmp_name"] . "<br />\n\n";
  }


$fileToConvert = $_FILES["file"]["tmp_name"];
$fileSize = $_FILES["file"]["size"] / (1024*1024);

$outputFile = md5( rand() + time() );




echo "FileToConvert Contents: '$fileToConvert'";
// Add Default file to Convert for testing
if ( !$fileToConvert ) {
	$fileToConvert = "/home/wxrsplitter/testFile.xml";

	echo "Copying '$fileToConvert' to '$OUTPUT_PATH$outputFile.xml'\n";
	
	if ( !copy($fileToConvert, "$OUTPUT_PATH$outputFile.xml") )
		die( "File copy Failed!" );
		
	$fileSize = filesize($fileToConvert) / (1024*1024);
	echo "FileSize: $fileSize";
}


$numChunks = (int)$fileSize;

move_uploaded_file($fileToConvert, "$OUTPUT_PATH$outputFile.xml");

$commandToRun = "python $CHOPPEDPRESS_CMD -n $numChunks -i $OUTPUT_PATH$outputFile.xml -o $OUTPUT_PATH$outputFile";

echo "Running $commandToRun ...";
$output = shell_exec( $commandToRun );

echo $output;

?>
