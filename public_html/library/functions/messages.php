<?php

	/*
	 * Create and echo message to screen
	 *
	 * Possible types:
	 * 	info
	 * 	warning
	 * 	error
	 * 	success
	 *
	 */
	function wxr_message ( $type = 'info' , $message = '' , $close = true ) {
		$output = '<div class="alert-message '.$type.' fade in" data-alert="alert">';
        $output .= '<a class="close" href="#">×</a>';
        $output .= '<p>'.$message.'</p>';

		// get ready to allow buttons and actions here.
		// will send array of button actions
		if ( isset( $actions ) ) {
	       // $message .= '<p>'.$message.'</p>';	
		}

      	$output .= '</div>';

		echo $output;
	}
?>