<?php

// $Header: /cvsroot/bitweaver/_bit_polls/admin/admin_polls.php,v 1.3 2009/10/01 13:45:46 wjames5 Exp $

// Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
// Copyright (c) 2006, Stephan Borg <wolff_borg@yahoo.com.au>
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.

// Initialization
require_once( '../../bit_setup_inc.php' );

include_once( POLLS_PKG_PATH.'poll_lib.php' );

$gBitSystem->verifyPackage( 'polls' );
$gBitSystem->verifyPermission( 'bit_p_admin_polls' );

if (!isset($polllib)) {
	$polllib = new PollLib();
}


if (!isset($_REQUEST["poll_id"])) {
	$_REQUEST["poll_id"] = 0;
}

$gBitSmarty->assign('poll_id', $_REQUEST["poll_id"]);

if (isset($_REQUEST["setlast"])) {
	$polllib->set_last_poll();
}

if (isset($_REQUEST["closeall"])) {
	$polllib->close_all_polls();
}

if (isset($_REQUEST["activeall"])) {
	$polllib->active_all_polls();
}

if ($_REQUEST["poll_id"]) {
	$info = $polllib->get_poll($_REQUEST["poll_id"]);
} else {
	$info = array();

	$info["title"] = '';
	$info["is_active"] = 'y';
	$info["publish_date"] = date("U");
}

$gBitSmarty->assign('title', $info["title"]);
$gBitSmarty->assign('is_active', $info["is_active"]);
$gBitSmarty->assign('publish_date', $info["publish_date"]);

if (isset($_REQUEST["remove"])) {
	$polllib->remove_poll($_REQUEST["remove"]);
}

if (isset($_REQUEST["fSubmit"])) {
	$publish_date = mktime($_REQUEST["Time_Hour"], $_REQUEST["Time_Minute"],
		0, $_REQUEST["Date_Month"], $_REQUEST["Date_Day"], $_REQUEST["Date_Year"]);

	$pid = $polllib->replace_poll($_REQUEST["poll_id"], $_REQUEST["title"], $_REQUEST["is_active"], $publish_date);

}
if ( empty( $_REQUEST["sort_mode"] ) ) {
	$sort_mode = 'publish_date_desc';
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
$polls = $polllib->list_polls($offset, $maxRecords, $sort_mode, $find);

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

$gBitSmarty->assign_by_ref('polls_data', $polls["data"]);

// Display the template
$gBitSystem->display( 'bitpackage:polls/admin_polls_main.tpl', tra('Admin Polls') , array( 'display_mode' => 'admin' ));

?>
