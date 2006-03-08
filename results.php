<?php

// $Header: /cvsroot/bitweaver/_bit_polls/results.php,v 1.1 2006/03/08 11:26:54 wolff_borg Exp $

// Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
// Copyright (c) 2006, Stephan Borg <wolff_borg@yahoo.com.au>
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.

// Initialization
require_once( '../bit_setup_inc.php' );

include_once( POLLS_PKG_PATH.'poll_lib.php' );

$gBitSystem->verifyPackage( 'polls' );
$gBitSystem->verifyPermission( 'bit_p_view_polls' );

if (!isset($polllib)) {
	$polllib = new PollLib();
}

if (!isset($_REQUEST["poll_id"])) {
	$gBitSystem->fatalError( tra("No poll indicated") );
}

$poll_info = $polllib->get_poll($_REQUEST["poll_id"]);
$polls = $polllib->list_active_polls(0, -1, 'publish_date_desc', '');
$options = $polllib->list_poll_options($_REQUEST["poll_id"], 0, -1, 'option_id_asc', '');

for ($i = 0; $i < count($options["data"]); $i++) {
	if ($poll_info["votes"] == 0) {
		$percent = 0;
	} else {
		$percent = number_format($options["data"][$i]["votes"] * 100 / $poll_info["votes"], 2);

		$options["data"][$i]["percent"] = $percent;
	}

	$width = $percent * 200 / 100;
	$options["data"][$i]["width"] = $percent;
}

// Poll comments
if ($gBitSystem->isFeatureActive( 'poll_comments' ) ) {
/* TODO - To fix
	$comments_per_page = $poll_comments_per_page;

	$comments_default_ordering = $poll_comments_default_ordering;
	$comments_vars = array('poll_id');
	$comments_prefix_var = 'poll:';
	$comments_object_var = 'poll_id';
	include_once ( KERNEL_PKG_PATH.'comments_inc.php' );
*/
}

$gBitSmarty->assign_by_ref('poll_info', $poll_info);
$gBitSmarty->assign_by_ref('polls', $polls["data"]);
$gBitSmarty->assign_by_ref('options', $options["data"]);

// Display the template
$gBitSystem->display( 'bitpackage:polls/poll_results.tpl', tra('Poll Results') );

?>
