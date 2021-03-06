<?php
/**
 * @version $Header$
 *
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * Copyright (c) 2006, Stephan Borg <wolff_borg@yahoo.com.au>
 * All Rights Reserved. See below for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See http://www.gnu.org/copyleft/lesser.html for details.
 *
 * @package polls
 * @subpackage functions
 */

/**
 * required setup
 */
require_once( '../kernel/setup_inc.php' );

include_once( POLLS_PKG_PATH.'poll_lib.php' );

$gBitSystem->verifyPackage( 'polls' );
$gBitSystem->verifyPermission( 'bit_p_view_polls' );

if (!isset($polllib)) {
	$polllib = new PollLib();
}


// This script can receive the thresold
// for the information as the number of
// days to get in the log 1,3,4,etc
// it will default to 1 recovering information for today
if ( empty( $_REQUEST["sort_mode"] ) ) {
	$sort_mode = 'publish_date_desc';
} else {
	$sort_mode = $_REQUEST["sort_mode"];
}

$gBitSmarty->assign_by_ref('sort_mode', $sort_mode);

// If offset is set use it if not then use offset =0
// use the maxRecords php variable to set the limit
// if sortMode is not set then use lastModif_desc
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

// Get a list of last changes to the Wiki database
$listpages = $polllib->list_all_polls($offset, $maxRecords, $sort_mode, $find);
// If there're more records then assign next_offset
$cant_pages = ceil($listpages["cant"] / $maxRecords);
$gBitSmarty->assign_by_ref('cant_pages', $cant_pages);
$gBitSmarty->assign('actual_page', 1 + ($offset / $maxRecords));

if ($listpages["cant"] > ($offset + $maxRecords)) {
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

$gBitSmarty->assign_by_ref('listpages', $listpages["data"]);
//print_r($listpages["data"]);

// Display the template
$gBitSystem->display( 'bitpackage:polls/old_polls.tpl', tra('Previous Polls') , array( 'display_mode' => 'display' ));

?>
