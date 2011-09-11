<?php

	/*
	 *	Functions go here
	 *
	 *
	 */
	
	function wxr_handle_uploads() {
	
		if ( isset ( $_FILES['bigfile'] ) ) {
		
			echo 'The upload worked!';
		
		
			// check and escape filenames
			
			// parse and split files
			
			// name files using some kind of hash
			
			// place in directory named with hash
			
			// offer download of files
			
			// create zip file
			
			$dir = '/folder/to/compress/';
			$dest = $dir . '/compressed.zip';
			
			Zip( $source , $dest );
			
			// offer download of all files zipped
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
						$zip->addFromString(basename( $source ), file_get_contents( $source ) );
					}
				}
				return $zip->close();
			}
		}
	    return false;
	}

?>