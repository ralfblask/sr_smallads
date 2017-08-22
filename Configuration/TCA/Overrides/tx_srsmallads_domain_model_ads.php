<?php

if (!isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_srsmallads_tx_srsmallads_domain_model_ads = array();
	$tempColumnstx_srsmallads_tx_srsmallads_domain_model_ads[$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:sr_smallads/Resources/Private/Language/locallang_db.xlf:tx_srsmallads.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'items' => array(
				array('ImprtData','Tx_SrSmallads_ImprtData')
			),
			'default' => 'Tx_SrSmallads_ImprtData',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tx_srsmallads_domain_model_ads', $tempColumnstx_srsmallads_tx_srsmallads_domain_model_ads, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'tx_srsmallads_domain_model_ads',
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['label']
);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']['Tx_SrSmallads_Ads']['showitem'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']['Tx_SrSmallads_ImprtData']['showitem'] = $GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']['Tx_SrSmallads_Ads']['showitem'];
} elseif(is_array($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types'])) {
	// use first entry in types array
	$tx_srsmallads_domain_model_ads_type_definition = reset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']);
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']['Tx_SrSmallads_ImprtData']['showitem'] = $tx_srsmallads_domain_model_ads_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']['Tx_SrSmallads_ImprtData']['showitem'] = '';
}
$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']['Tx_SrSmallads_ImprtData']['showitem'] .= ',--div--;LLL:EXT:sr_smallads/Resources/Private/Language/locallang_db.xlf:tx_srsmallads_domain_model_imprtdata,';
$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['types']['Tx_SrSmallads_ImprtData']['showitem'] .= '';

$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns'][$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:sr_smallads/Resources/Private/Language/locallang_db.xlf:tx_srsmallads_domain_model_ads.tx_extbase_type.Tx_SrSmallads_ImprtData','Tx_SrSmallads_ImprtData');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);## EXTENSION BUILDER DEFAULTS END TOKEN - Everything BEFORE this line is overwritten with the defaults of the extension builder

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['ctrl']['external'] = array(
		0 => array(
			'connector' => 'csv',
			'parameters' => array(
				'filename' => 'fileadmin/user_upload/csv_import/kaz_utf8.csv',
				'delimiter' => ";",
				'text_qualifier' => '"',
				'skip_rows' => 1,
				'encoding' => 'utf8'
			),
			'data' => 'array',
			'reference_uid' => 'external_number',
			'priority' => 1010,
			'description' => 'Import of all smallads',
			'pid' => 58,
			'disabledOperations' => ''
		),
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['title'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['title']['external'] = array (
		0 => array(
			'field' => 'stichwort'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['bodytext'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['bodytext']['external'] = array (
		0 => array(
			'field' => 'text'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['code'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['code']['external'] = array (
		0 => array(
			'field' => 'chiffre'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['year'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['year']['external'] = array (
		0 => array(
			'field' => 'jahr'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['month'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['month']['external'] = array (
		0 => array(
			'field' => 'monat'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['design'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['design']['external'] = array (
		0 => array(
			'field' => 'grafik'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['email'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['email']['external'] = array (
		0 => array(
			'field' => 'email'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['external_number'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['external_number']['external'] = array (
		0 => array(
			'field' => 'nummer'
		)
	);
}

if (isset($GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['adscategories'])) {
	$GLOBALS['TCA']['tx_srsmallads_domain_model_ads']['columns']['adscategories']['external'] = array (
		0 => array(
			'field' => 'rubrik',
			'MM' => array(
				'mapping' => array(
					'table' => 'tx_srsmallads_domain_model_categories',
					'reference_field' => 'original_category'
				)
			)
		)
	);
}