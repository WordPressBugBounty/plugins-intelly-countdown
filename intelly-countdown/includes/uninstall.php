<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

register_deactivation_hook( ICP_PLUGIN_FILE, 'icp_uninstall' );
function icp_uninstall( $networkwide = null ) {
	global $icp;
	$icp->Options->setActive( false );
}

