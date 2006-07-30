<?php
$registerHash = array(
	'package_name' => 'polls',
	'package_path' => dirname( __FILE__ ).'/',
);
$gBitSystem->registerPackage( $registerHash );

if( $gBitSystem->isPackageActive( 'polls' ) ) {
//	$gBitSystem->registerAppMenu( POLLS_PKG_NAME, ucfirst( POLLS_PKG_DIR ), POLLS_PKG_URL.'index.php', 'bitpackage:polls/menu_polls.tpl', POLLS_PKG_NAME );

	if (isset($_REQUEST["pollVote"])) {
		include_once(POLLS_PKG_PATH . 'poll_lib.php');
		if ($gBitUser->hasPermission( 'bit_p_vote_poll' ) && !$polllib->user_has_voted($gBitUser->getUserId(), 'poll' . $_REQUEST["polls_poll_id"]) && isset($_REQUEST["polls_option_id"])) {

			$polllib->register_user_vote($gBitUser->getUserId(), 'poll' . $_REQUEST["polls_poll_id"]);

			$polllib->poll_vote($_REQUEST["polls_poll_id"], $_REQUEST["polls_option_id"]);
		}

		$poll_id = $_REQUEST["polls_poll_id"];
		header ("location: " . POLLS_PKG_URL . "results.php?poll_id=$poll_id");
	} 

}

?>
