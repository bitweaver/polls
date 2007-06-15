<?php
// removed image data (replaced with storage_id ref)
// removed hash, state
// removed isfloat (?)
// removed size, topic_name (replaced with topic_id)
// replaced type_name with polls_type_id

$tables = array(
	'tiki_polls' => "
		poll_id I4 AUTO PRIMARY,
		title C(250) NOTNULL,
		votes I4,
		is_active C(1),
		publish_date I4
	",

	'tiki_poll_options' => "
		poll_id I4 NOTNULL,
		option_id I4 AUTO PRIMARY,
		title C(250) NOTNULL,
		votes I4
	"

);

global $gBitInstaller;

foreach( array_keys( $tables ) AS $tableName ) {
    $gBitInstaller->registerSchemaTable( POLLS_PKG_DIR, $tableName, $tables[$tableName] );
}

$gBitInstaller->registerPackageInfo( POLLS_PKG_DIR, array(
	'description' => "This package manages polls.",
	'license' => '<a href="http://www.gnu.org/licenses/licenses.html#LGPL">LGPL</a>',
) );

// $indices = array();
// $gBitInstaller->registerSchemaIndexes( POLLS_PKG_DIR, $indices );

$gBitInstaller->registerSchemaDefault( POLLS_PKG_DIR, array(
) );

// ### Default UserPermissions
$gBitInstaller->registerUserPermissions( POLLS_PKG_NAME, array(
	array('bit_p_edit_polls', 'Can edit polls', 'editors', POLLS_PKG_NAME),
	array('bit_p_remove_polls', 'Can remove polls', 'editors', POLLS_PKG_NAME),
	array('bit_p_admin_polls', 'Can admin polls', 'editors', POLLS_PKG_NAME),
	array('bit_p_view_polls', 'Can view poll results', 'basic', POLLS_PKG_NAME),
	array('bit_p_vote_poll', 'Can vote polls', 'basic', POLLS_PKG_NAME),
) );

// ### Default Preferences
$gBitInstaller->registerPreferences( POLLS_PKG_NAME, array(
	array( POLLS_PKG_NAME, 'poll_comments','y'),
	array( POLLS_PKG_NAME, 'poll_comments_default_ordering','points_desc'),
	array( POLLS_PKG_NAME, 'poll_comments_per_page','10'),
) );
?>
