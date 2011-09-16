<?php

	/*
	 * WXR FXR Configuration
	 *
	 */

	/*
	 * Choose some options...
	 *
	 */
	
	// define specific theme
	$theme = 'default';
	
	// choose some stuff
	define ( 'SPLIT_FILES_DIRNAME' ,	'splitFiles' );
	define ( 'MAX_INT_LENGTH' ,			3 );
	
	// Debug ?
	define ( 'WXR_DEBUG' , 		false );
	
	/*
	 * Stop Editing here
	 *
	 */
		
	define ( 'WXR_CMD' , 		WXR_BASEDIR . '/choppedPress.py' );
	define ( 'WXR_PATH' , 		WXR_DIR . '/'.SPLIT_FILES_DIRNAME.'/' );

	define ( 'WXR_URL' , 		$_SERVER["REQUEST_URI"] );

	define ( 'LIBRARY' ,		WXR_DIR . '/library' );
	define ( 'FUNCTIONS' ,		LIBRARY . '/functions' );
	define ( 'THEMES' ,			WXR_DIR . '/themes' );
	
	if ( !file_exists( THEMES . '/' . $theme ) ) {
		define ( 'THEME' , 'default' );
	} else {
		define ( 'THEME' , $theme );
	}
	
	/* 
	 * The old settings (for refernce )
	 * delete once working okay
	 *
	 */
	
	// $CHOPPEDPRESS_CMD = 		"/home/wxrsplitter/wxrsplitter.getsource.net/choppedPress.py";
	// $OUTPUT_PATH = 			"/home/wxrsplitter/wxrsplitter.getsource.net/public_html/splitFiles/";
	// $OUTPUT_PATH_LIVE = 		"http://wxrsplitter.getsource.net/splitFiles/";
	// $MAX_INT_LENGTH = 		3;
	// $DEBUG = 				false;

	/* 
	 * make our folder to hold split files if it is not there yet
	 *
	 */

	if ( !file_exists( WXR_PATH ) )
		mkdir( WXR_PATH );

	/*
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