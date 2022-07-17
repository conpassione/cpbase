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

// Provide TypoScript-File to select in TS-Template
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile (
	'cp_base',
	'Configuration/TypoScript',
	'Conpassione Base Extension'
);

?>
