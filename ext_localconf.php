<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'StadtRevue.' . $_EXTKEY,
	'Pi1',
	array(
		'Ads' => 'list, show, new, create, edit, update, delete',
		'Categories' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Ads' => 'list, show, new, create, edit, update, delete',
		'Categories' => 'list, show',
		
	)
);
## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder