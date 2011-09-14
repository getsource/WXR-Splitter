<?php

	/*
	 * Know what page we are on
	 *
	 */
	
	
	// this will be global now...
	$_REQUEST = array_merge( (array)$_GET , (array)$_POST);
	$page_info = wxr_handle_url();

	// find and load actual pages...
	if ( isset( $page_info['slug'] ) ) {
		
		$page = trailingslashit( THEME ) . $page_info['slug'] . '.php' ;
		
		if ( file_exists( $page ) ) {
			
			// load actual theme file...
			include ( $page );
		}
	}

?>