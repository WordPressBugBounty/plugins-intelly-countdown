<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

function icp_ui_whats_new() {
	global $icp;
	$icp->Options->setShowWhatsNew( false );
	?>
	<style>
		.icp-headline {
			font-size:40px;
			font-weight:bold;
			text-align:center;
		}
		.icp-sub-headline {
			font-size:35px;
			font-weight:normal;
			text-align:center;
		}
	</style>

	<p class="icp-headline">Getting started with CA Enhancer</p>
	<p class="icp-sub-headline">Watch this video before begin!</p>
	<div style="text-align: center">
		<iframe title="Getting started" width="854" height="480" src="https://www.youtube.com/embed/c3yfd5oiVGk?autoplay=1"></iframe>
		<br>
		<br>
		<?php
		$icp->Form->prefix = 'License';
		$args              = array(
			'uri'   => ICP_TAB_SETTINGS_URI,
			'theme' => 'primary',
			'class' => 'btn-lg',
		);
		$icp->Form->button( 'fbConnect', $args );
		?>
	</div>
	<?php
}
