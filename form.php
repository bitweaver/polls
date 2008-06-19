<?php
/**
 * @version $Header: /cvsroot/bitweaver/_bit_polls/form.php,v 1.2 2008/06/19 05:40:23 lsces Exp $
 *
 * Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
 * Copyright (c) 2006, Stephan Borg <wolff_borg@yahoo.com.au>
 * All Rights Reserved. See copyright.txt for details and a complete list of authors.
 * Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
 *
 * @package polls
 * @subpackage functions
 */

/**
 * required setup
 */
require_once( '../bit_setup_inc.php' );

include_once( POLLS_PKG_PATH.'poll_lib.php' );

$gBitSystem->verifyPackage( 'polls' );
$gBitSystem->verifyPermission( 'bit_p_vote_poll' );

if (!isset($polllib)) {
	$polllib = new PollLib();
}

if (!isset($_REQUEST["poll_id"])) {
	$gBitSystem->fatalError( tra("No poll indicated") );
}

$poll_info = $polllib->get_poll($_REQUEST["poll_id"]);
$options = $polllib->list_poll_options($_REQUEST["poll_id"], 0, -1, 'title_desc', '');

$gBitSmarty->assign_by_ref('poll_info', $poll_info);
$gBitSmarty->assign_by_ref('polls', $options["data"]);

// Display the template
$gBitSystem->display( 'bitpackage:polls/poll_form.tpl', tra('Poll Form') );

?>
