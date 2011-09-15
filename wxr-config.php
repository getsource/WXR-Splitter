<?php

	/**
	 * Configuration Options
	 */

	/** Path Defines **/
	// Path to choppedPress Python Script
	define ( 'WXR_CMD' ,		WXR_BASEDIR . '/choppedPress.py' );

	// Complete local path to public_html
	define ( 'WXR_DIR' ,		WXR_BASEDIR . 'public_html' );

	// Relative path within public_html to output files.
	define ( 'WXR_OUTPUT_DIR' ,	'/splitFiles/' );

	// Local output path
	define ( 'WXR_PATH' , 		WXR_DIR . WXR_OUTPUT_DIR );

	// Current Requested URI
	define ( 'WXR_URL' ,		$_SERVER["REQUEST_URI"] );


	/** Library Defines **/
	// Local Path to Library
	define ( 'LIBRARY' ,		WXR_DIR . '/library' );

	// Local Functions Path within Library
	define ( 'FUNCTIONS' ,		LIBRARY . '/functions' );

	// Local Theme Path within Library
	define ( 'THEME' ,			WXR_DIR . '/theme' );

	// Defines Maximum amount of digits to pad for output XML Files
	define ( 'MAX_INT_LENGTH' ,	3 );

	// Toggles Debug Output
	define ( 'WXR_DEBUG' , 		false );


	if ( !file_exists( WXR_PATH ) )
		mkdir( WXR_PATH );


	/**
	 * Function to include files from a directory.
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

	wxr_include_folder( 'functions' );

?>
