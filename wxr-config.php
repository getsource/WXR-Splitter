<?php

	/**
	 * WXR FXR Configuration
	 */


	/** General Configuration **/

	// Define Theme to Use
	$theme = 'default';

	// Defines Maximum amount of digits to pad for output XML Files
	define ( 'MAX_INT_LENGTH' ,	3 );

	// Toggles Debug Output
	define ( 'WXR_DEBUG' , 		false );


	/** Path Configuration **/

	// Path to choppedPress Python Script	
	define ( 'WXR_CMD' , 		WXR_BASEDIR . '/choppedPress.py' );

	// Relative path within public_html to output files.
	define ( 'WXR_OUTPUT_DIR' ,	'/splitFiles/' );

	// Local output path
	define ( 'WXR_PATH' ,		WXR_DIR . WXR_OUTPUT_DIR );

	// Current Requested URI
	define ( 'WXR_URL' , 		$_SERVER["REQUEST_URI"] );


	/** Library Defines **/

	// Local Path to Library
	define ( 'LIBRARY' ,		WXR_DIR . '/library' );

	// Local Functions Path within Library
	define ( 'FUNCTIONS' ,		LIBRARY . '/functions' );

	// Local Themes Path within Library
	define ( 'THEMES' ,			WXR_DIR . '/themes' );


	/**
	 * Stop Editing here
	 */

	// Create define for Local Path to current chosen theme	
	if ( !file_exists( THEMES . '/' . $theme ) ) {
		define ( 'THEME' ,		'default' );
	} else {
		define ( 'THEME' ,		$theme );
	}

	// Make our folder to hold split files if it is not there yet
	if ( !file_exists( WXR_PATH ) )
		mkdir( WXR_PATH );


	/**
	 * Function to include a directory of files from the library directory.
	 */
	function wxr_include_folder( $dir='' ) {
		if ( $dir != '' ) {
			$path = LIBRARY . '/' . $dir;
			$includes = array();
			if ( file_exists( $path ) ) { 
				if ( $handle = opendir( $path ) ) {
					$displayString = "";
					$count = 0; 	
					while( false !== ( $file = readdir( $handle ) ) ) {
						if ( $file != "." && $file != ".." ) {
							$include = $file;
							$file = substr( $file, strrpos( $file, '.' ) + 1 );
							if ( $file == "php" ) { 
								$includes[$count] = $include;
								$count++;
							}
						}	
					}
					if ( $count = 0 ) {
						echo 'No pages created yet';
					}					
				}
			}
			foreach ( $includes as $include ) {
				require_once( LIBRARY . '/' . $dir . '/' . $include ); 
			}
		}
	};

?>