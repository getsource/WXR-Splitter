<?php

	/**
	 *	Functions go here
	 */

	/**
	 * Add trailing slash if it exists.
	 *
	 * from WordPress
	 *
	 * @param string $string What to remove the trailing slash from.
	 * @return string String without the trailing slash.
	 */
	function trailingslashit($string) {
		return untrailingslashit($string) . '/';
	}


	/**
	 * Removes trailing slash if it exists.
	 *
	 * from WordPress
	 *
	 * @param string $string What to remove the trailing slash from.
	 * @return string String without the trailing slash.
	 */
	function untrailingslashit($string) {
		return rtrim($string, '/');
	}


	function wxr_handle_url() {
		$page = array();

		$URL = (!empty($_SERVER['HTTPS'])) ? "https://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] : "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'];

		if ( !empty( $URL ) ) {
			$page['slug'] = end(explode ('/', $URL));
			$page['depth'] = count( explode('/' , str_replace( WXR_URL . '/', '', $URL) ) );
		}

		return $page;
	}


	function wxr_handle_uploads() {

		if ( isset ( $_FILES['bigfile'] ) ) {

			$CHOPPEDPRESS_CMD = WXR_CMD;
			$OUTPUT_PATH = WXR_PATH;
			$OUTPUT_URL = WXR_OUTPUT_DIR;

			// check and escape filenames
			// parse and split files
			// name files using some kind of hash
			// place in directory named with hash
			// offer download of files

			if ($_FILES["bigfile"]["error"] > 0) {
				die("File Upload Failed");
			}
		
			$fileToConvert = $_FILES["bigfile"]["tmp_name"];
			$fileSize = $_FILES["bigfile"]["size"] / (1024*1024);
			$outputFile = md5( rand() + time() );
		
			$numChunks = (int)$fileSize;

			$commandToRun = "python $CHOPPEDPRESS_CMD -n $numChunks -i $fileToConvert -o $OUTPUT_PATH$outputFile";
		
			$commandOutput = shell_exec( $commandToRun );
		
			if ( WXR_DEBUG )
				echo $commandOutput;
		
			// Output File Links
			echo "<h2>Your Split Files!<h2>";
			echo "<ul>";

			$splitFiles = Array();

			for ($i=1; $i <= $numChunks; $i++) {
				$paddedFileName = $outputFile . str_pad( (int)$i, MAX_INT_LENGTH, "0", STR_PAD_LEFT) . ".xml";
				$splitFiles[$i] = $paddedFileName;
				
				echo "<li><a href='$OUTPUT_URL$paddedFileName'>$paddedFileName</a></li>";
			}

			echo "</ul>";
		
			// Now, Create ZIP file
			$dir = WXR_PATH;
			$dest = "$dir$outputFile.zip";

			$zippedFiles = 0;
			foreach ( $splitFiles as $eachFile) {
				if ( Zip( "$dir$eachFile" , $dest ) )
					$zippedFiles++;
			}

			// If compression is successful, offer download of all files zipped
			if ($zippedFiles == $numChunks) {
				echo "<h2>Or try this zip:</h2>";
				echo "<p><a href='$OUTPUT_URL$outputFile.zip'>$outputFile.zip</a></p>";
			}

		} else {
			// echo 'nope';
		}
	}


	function Zip( $source, $destination ) {

		if ( extension_loaded( 'zip' ) === true ) {

			if ( file_exists( $source ) === true ) {

				$zip = new ZipArchive();
				if ( $zip->open( $destination, ZIPARCHIVE::CREATE ) === true ) {

					$source = realpath( $source );

					if ( is_dir( $source ) === true ) {
						$files = new RecursiveIteratorIterator( new RecursiveDirectoryIterator( $source ), RecursiveIteratorIterator::SELF_FIRST );

						foreach ( $files as $file ) {
							$file = realpath( $file );

							if ( is_dir( $file ) === true ) {
								$zip->addEmptyDir( str_replace( $source . '/', '', $file . '/' ) );

							} else if ( is_file( $file ) === true ) {
								$zip->addFromString( str_replace( $source . '/', '', $file ), file_get_contents( $file ) );
							}
						}

					} else if ( is_file( $source ) === true ) {
						$zip->addFromString( basename( $source ), file_get_contents( $source ) );
					}
				}
				return $zip->close();
			}
		}
	    return false;
	}

?>
