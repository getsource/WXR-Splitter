<?php

	/*
	 * Load WXR FXR
	 *
	 */

	// Complete local path to public_html	
	define( "WXR_BASEDIR" , 	dirname( dirname( __FILE__ ) ) . '/' ); 
	define( 'WXR_DIR' ,			WXR_BASEDIR . 'public_html' );

	if ( file_exists( WXR_DIR . '/wxr-config.php' ) )
		require_once( WXR_DIR . '/wxr-config.php' );
	else
		require_once( WXR_BASEDIR . '/wxr-config.php' );

	require_once( WXR_DIR. '/wxr-init.php' );

?>