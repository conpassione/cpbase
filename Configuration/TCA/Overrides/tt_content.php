<?php
/*--------------------------------------------------------------
 * Extension general config file for ext "cp_base".
 *
 * Generated 01.06.2020
 *--------------------------------------------------------------
 */

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

$temporaryColumn = array(
	'ce_width' => [
		'exclude' => 1,
		'label' => 'CE-Breite',
	    'config' => [
	        'type' => 'select',
	        'renderType' => 'selectSingle',
	        'size' => 1,
	        'maxItems' => 1,
	        'items' => [
	            ['normal', 'normal'],
	            ['schmal', 'small'],
	            ['vollbreit', 'viewportwidth']
		    ],
		    'default' => 'normal',
	    ],
	    'displayCond' => 'FIELD:colPos:<:3'
	]
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns (
    'tt_content',
    $temporaryColumn
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette (
    'tt_content',
    'frames',
    '--linebreak--,ce_width',
    'after:space_after_class'
);

// \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes (
// 	'tt_content',
// 	'ce_width'
// );

?>