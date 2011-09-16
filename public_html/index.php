<?php

	/*
	 * Load WXR FXR
	 *
	 */
	
	define( "WXR_BASEDIR" , 	dirname( dirname( __FILE__ ) ) . '/' ); 
	define( 'WXR_DIR' ,			WXR_BASEDIR . 'public_html' );
	
	require_once ( WXR_DIR . '/wxr-config.php' );

	require_once (  WXR_DIR . '/wxr-init.php' );
	

?>