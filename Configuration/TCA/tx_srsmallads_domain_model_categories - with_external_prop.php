<?php
return array(
	'ctrl' => array(
		'title'	=> 'LLL:EXT:sr_smallads/Resources/Private/Language/locallang_db.xlf:tx_srsmallads_domain_model_categories',
		'label' => 'category',
		'tstamp' => 'tstamp',
		'crdate' => 'crdate',
		'cruser_id' => 'cruser_id',
		'dividers2tabs' => TRUE,
		'versioningWS' => 2,
		'versioning_followPages' => TRUE,

		'languageField' => 'sys_language_uid',
		'transOrigPointerField' => 'l10n_parent',
		'transOrigDiffSourceField' => 'l10n_diffsource',
		'delete' => 'deleted',
		'enablecolumns' => array(
			'disabled' => 'hidden',
			'starttime' => 'starttime',
			'endtime' => 'endtime',
		),
		'searchFields' => 'category,original_category,costless,',
		'iconfile' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath('sr_smallads') . 'Resources/Public/Icons/tx_srsmallads_domain_model_categories.gif',
		'external' => array(
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
				'reference_uid' => 'original_category',
				'priority' => 2000,
				'description' => 'Import of all adcategories',
				'pid' => 58,
				'disabledOperations' => ''
			)
		)

	),
	'interface' => array(
		'showRecordFieldList' => 'sys_language_uid, l10n_parent, l10n_diffsource, hidden, category, original_category, costless',
	),
	'types' => array(
		'1' => array('showitem' => 'sys_language_uid;;;;1-1-1, l10n_parent, l10n_diffsource, hidden;;1, category, original_category, costless, --div--;LLL:EXT:cms/locallang_ttc.xlf:tabs.access, starttime, endtime'),
	),
	'palettes' => array(
		'1' => array('showitem' => ''),
	),
	'columns' => array(
	
		'sys_language_uid' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.language',
			'config' => array(
				'type' => 'select',
				'foreign_table' => 'sys_language',
				'foreign_table_where' => 'ORDER BY sys_language.title',
				'items' => array(
					array('LLL:EXT:lang/locallang_general.xlf:LGL.allLanguages', -1),
					array('LLL:EXT:lang/locallang_general.xlf:LGL.default_value', 0)
				),
			),
		),
		'l10n_parent' => array(
			'displayCond' => 'FIELD:sys_language_uid:>:0',
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.l18n_parent',
			'config' => array(
				'type' => 'select',
				'items' => array(
					array('', 0),
				),
				'foreign_table' => 'tx_srsmallads_domain_model_categories',
				'foreign_table_where' => 'AND tx_srsmallads_domain_model_categories.pid=###CURRENT_PID### AND tx_srsmallads_domain_model_categories.sys_language_uid IN (-1,0)',
			),
		),
		'l10n_diffsource' => array(
			'config' => array(
				'type' => 'passthrough',
			),
		),

		't3ver_label' => array(
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.versionLabel',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'max' => 255,
			)
		),
	
		'hidden' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.hidden',
			'config' => array(
				'type' => 'check',
			),
		),
		'starttime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.starttime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),
		'endtime' => array(
			'exclude' => 1,
			'l10n_mode' => 'mergeIfNotBlank',
			'label' => 'LLL:EXT:lang/locallang_general.xlf:LGL.endtime',
			'config' => array(
				'type' => 'input',
				'size' => 13,
				'max' => 20,
				'eval' => 'datetime',
				'checkbox' => 0,
				'default' => 0,
				'range' => array(
					'lower' => mktime(0, 0, 0, date('m'), date('d'), date('Y'))
				),
			),
		),

		'category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sr_smallads/Resources/Private/Language/locallang_db.xlf:tx_srsmallads_domain_model_categories.category',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
			'external' => array(
				0 => array(
					'field' => 'rubrik'
				)
			)
		),
		'original_category' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sr_smallads/Resources/Private/Language/locallang_db.xlf:tx_srsmallads_domain_model_categories.original_category',
			'config' => array(
				'type' => 'input',
				'size' => 30,
				'eval' => 'trim'
			),
			'external' => array(
				0 => array(
					'field' => 'rubrik'
				)
			)
		),
		'costless' => array(
			'exclude' => 1,
			'label' => 'LLL:EXT:sr_smallads/Resources/Private/Language/locallang_db.xlf:tx_srsmallads_domain_model_categories.costless',
			'config' => array(
				'type' => 'check',
				'default' => 0
			)
		),
		
	),
);