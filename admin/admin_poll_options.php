<?php

// $Header: /cvsroot/bitweaver/_bit_polls/admin/admin_poll_options.php,v 1.2 2008/06/25 22:21:20 spiderr Exp $

// Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
// Copyright (c) 2006, Stephan Borg <wolff_borg@yahoo.com.au>
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.

// Initialization
require_once( '../../bit_setup_inc.php' );

include_once( POLLS_PKG_PATH.'poll_lib.php' );

$gBitSystem->verifyPackage( 'polls' );
$gBitSystem->verifyPermission( 'bit_p_admin_polls' );

if (!isset($polllib)) {
	$polllib = new PollLib();
}

if (!isset($_REQUEST["poll_id"])) {
	$gBitSystem->fatalError( tra("No poll indicated") );
}

$gBitSmarty->assign('poll_id', $_REQUEST["poll_id"]);
$poll_info = $polllib->get_poll($_REQUEST["poll_id"]);
$gBitSmarty->assign('poll_info', $poll_info);

if (!isset($_REQUEST["option_id"])) {
	$_REQUEST["option_id"] = 0;
}

$gBitSmarty->assign('option_id', $_REQUEST["option_id"]);

if ($_REQUEST["option_id"]) {
	$info = $polllib->get_poll_option($_REQUEST["option_id"]);
} else {
	$info = array();

	$info["title"] = '';
	$info["votes"] = 0;
}

$gBitSmarty->assign('title', $info["title"]);
$gBitSmarty->assign('votes', $info["votes"]);

if (isset($_REQUEST["remove"])) {
	$polllib->remove_poll_option($_REQUEST["remove"]);
}

if (isset($_REQUEST["save"])) {
	$polllib->replace_poll_option($_REQUEST["poll_id"], $_REQUEST["option_id"], $_REQUEST["title"]);
}

if ( empty( $_REQUEST["sort_mode"] ) ) {
	$sort_mode = 'poll_id_asc';
} else {
	$sort_mode = $_REQUEST["sort_mode"];
}

if (!isset($_REQUEST["offset"])) {
	$offset = 0;
} else {
	$offset = $_REQUEST["offset"];
}

$gBitSmarty->assign_by_ref('offset', $offset);

if (isset($_REQUEST["find"])) {
	$find = $_REQUEST["find"];
} else {
	$find = '';
}

$gBitSmarty->assign('find', $find);

$gBitSmarty->assign_by_ref('sort_mode', $sort_mode);
$polls = $polllib->list_poll_options($_REQUEST["poll_id"], 0, -1, $sort_mode, $find);
$cant_pages = ceil($polls["cant"] / $maxRecords);
$gBitSmarty->assign_by_ref('cant_pages', $cant_pages);
$gBitSmarty->assign('actual_page', 1 + ($offset / $maxRecords));

if ($polls["cant"] > ($offset + $maxRecords)) {
	$gBitSmarty->assign('next_offset', $offset + $maxRecords);
} else {
	$gBitSmarty->assign('next_offset', -1);
}

// If offset is > 0 then prev_offset
if ($offset > 0) {
	$gBitSmarty->assign('prev_offset', $offset - $maxRecords);
} else {
	$gBitSmarty->assign('prev_offset', -1);
}

$gBitSmarty->assign_by_ref('polls', $polls["data"]);

// Display the template
$gBitSystem->display( 'bitpackage:polls/admin_poll_options.tpl', tra('Admin Poll Options') , array( 'display_mode' => 'admin' ));

?>
