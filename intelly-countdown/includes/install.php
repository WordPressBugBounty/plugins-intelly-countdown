<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

register_activation_hook( ICP_PLUGIN_FILE, 'icp_install' );
function icp_install( $networkwide = null ) {
	global $icp;

	$time = $icp->Options->getPluginInstallDate();
	if ( 0 == $time ) {
		$icp->Options->setPluginInstallDate( time() );
	} elseif ( $icp->Options->isTrackingEnable() ) {
		$icp->Tracking->sendTracking( true );
	}
	$icp->Options->setPluginUpdateDate( time() );
	$icp->Options->setPluginFirstInstall( true );
	$icp->Options->setTrackingLastSend( 0 );
}

add_action( 'admin_init', 'icp_first_redirect' );
function icp_first_redirect() {
	global $icp;
	if ( $icp->Options->isPluginFirstInstall() ) {
		$icp->Options->setPluginFirstInstall( false );
		$icp->Options->setShowActivationNotice( true );

		$icp->Options->setShowWhatsNew( false ); //TRUE
		$icp->Utils->redirect( ICP_TAB_SETTINGS_URI );
	}
}



