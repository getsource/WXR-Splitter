<?php

	/*
	 * Include needed files
	 */
	wxr_include_folder( 'functions' );


	/*
	 * Figure out what page we are on and load it
	 */

	// this will be global now...
	$_REQUEST = array_merge( (array)$_GET , (array)$_POST);

	$page_info = wxr_handle_url();

	// find actual pages...
	if ( isset( $page_info['slug'] ) && $page_info['slug']  != '' ) {
		$page = trailingslashit( THEMES ) . trailingslashit( THEME ) . $page_info['slug'] . '.php' ;
	} else {
		$page = trailingslashit( THEMES ) . trailingslashit( THEME ) . 'home.php' ;
	}

	// load correct page
	if ( file_exists( $page ) ) {
		// load actual theme file...
		include ( $page );
	}

?>