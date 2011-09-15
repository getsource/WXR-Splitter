<?php

	// $CHOPPEDPRESS_CMD = 		"/home/wxrsplitter/wxrsplitter.getsource.net/choppedPress.py";
	// $OUTPUT_PATH = 			"/home/wxrsplitter/wxrsplitter.getsource.net/public_html/splitFiles/";
	// $OUTPUT_PATH_LIVE = 		"http://wxrsplitter.getsource.net/splitFiles/";
	// $MAX_INT_LENGTH = 		3;
	// $DEBUG = 				false;

	define ( 'WXR_DIR' ,		WXR_BASEDIR . 'public_html' );

	define ( 'WXR_CMD' , 		WXR_BASEDIR . '/choppedPress.py' );
	define ( 'WXR_PATH' , 		WXR_DIR . '/splitFiles/' );

	define ( 'WXR_URL' , 		$_SERVER["REQUEST_URI"] );

	define ( 'LIBRARY' ,		WXR_DIR . '/library' );
	define ( 'FUNCTIONS' ,		LIBRARY . '/functions' );
	define ( 'THEME' ,			WXR_DIR . '/theme' );

	define ( 'MAX_INT_LENGTH' ,	3 );
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