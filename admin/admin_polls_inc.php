<?php

// $Header: /cvsroot/bitweaver/_bit_polls/admin/admin_polls_inc.php,v 1.1 2006/03/08 11:26:54 wolff_borg Exp $

// Copyright (c) 2002-2003, Luis Argerich, Garland Foster, Eduardo Polidor, et. al.
// Copyright (c) 2006, Stephan Borg <wolff_borg@yahoo.com.au>
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
if (isset($_REQUEST["pollprefs"])) {
	if (isset($_REQUEST["poll_comments_per_page"])) {
		$gBitSystem->storePreference("poll_comments_per_page", $_REQUEST["poll_comments_per_page"]);

		$gBitSmarty->assign('poll_comments_per_page', $_REQUEST["poll_comments_per_page"]);
	}

	if (isset($_REQUEST["poll_comments_default_ordering"])) {
		$gBitSystem->storePreference("poll_comments_default_ordering", $_REQUEST["poll_comments_default_ordering"]);

		$gBitSmarty->assign('poll_comments_default_ordering', $_REQUEST["poll_comments_default_ordering"]);
	}

	if (isset($_REQUEST["poll_comments"]) && $_REQUEST["poll_comments"] == "on") {
		$gBitSystem->storePreference("poll_comments", 'y');

		$gBitSmarty->assign("poll_comments", 'y');
	} else {
		$gBitSystem->storePreference("poll_comments", 'n');

		$gBitSmarty->assign("poll_comments", 'n');
	}

}
?>
