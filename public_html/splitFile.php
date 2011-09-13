<?php

$CHOPPEDPRESS_CMD = "/home/wxrsplitter/wxrsplitter.getsource.net/choppedPress.py";
$OUTPUT_PATH = "/home/wxrsplitter/wxrsplitter.getsource.net/public_html/splitFiles/";
$OUTPUT_PATH_LIVE = "http://wxrsplitter.getsource.net/splitFiles/";
$MAX_INT_LENGTH = 3;
$DEBUG = false;


if ($_FILES["file"]["error"] > 0) {
	die("File Upload Failed");
	// echo "Error: " . $_FILES["file"]["error"] . "<br />\n";
}

$fileToConvert = $_FILES["file"]["tmp_name"];
$fileSize = $_FILES["file"]["size"] / (1024*1024);
$outputFile = md5( rand() + time() );

$numChunks = (int)$fileSize;


$commandToRun = "python $CHOPPEDPRESS_CMD -n $numChunks -i $fileToConvert -o $OUTPUT_PATH$outputFile";

$commandOutput = shell_exec ( $commandToRun );

if ($DEBUG)
	echo $commandOutput;


// Output File Links
echo ("Your Split Files!<br>");

for ($i=1; $i <= $numChunks; $i++) {
	$paddedFileName = $outputFile . str_pad( (int)$i, $MAX_INT_LENGTH, "0", STR_PAD_LEFT) . ".xml";
	echo "<a href='$OUTPUT_PATH_LIVE$paddedFileName'>$paddedFileName</a><br>";
}

?>
