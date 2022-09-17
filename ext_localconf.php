<?php
/*
 #---------------------------------------------------------------
 # ext_localconf file for ext cpbase
 #
 # Generated 01.06.2020 by www.conpassione.ch
 #---------------------------------------------------------------
 * Set a full extension configuration ($value could be a nested array, too)
 * ->set('myExtension', '', ['aFeature' => 'true', 'aCustomClass' => 'css-foo'])
 */

defined('TYPO3') or die('Access denied.');

use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Configuration\ExtensionConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
use TYPO3\CMS\Core\Imaging\IconRegistry;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationExtensionNotConfiguredException;
use TYPO3\CMS\Core\Configuration\Exception\ExtensionConfigurationPathDoesNotExistException;
use TYPO3\CMS\Core\Core\Environment;

// Vorbereitung Konfiguration
try {
    $extConf = GeneralUtility::makeInstance(ExtensionConfiguration::class)->get('cpbase');

    if (Environment::getContext() == 'Development') {
        $beConf['backendLogo'] = 'EXT:cpbase/Resources/Public/Icons/alfabeta.svg';
    } else {
        $beConf['backendLogo'] = '';
    }

    // Typoscript konfigurieren
    ExtensionManagementUtility::addPageTSConfig('
        @import "EXT:cpbase/Configuration/TSconfig/Page/setup.tsconfig"
    ');

    ExtensionManagementUtility::addUserTSConfig('
            @import "EXT:cpbase/Configuration/TSconfig/User/DefaultUser.tsconfig">
    ');

    // CK-Editor Konfiguration laden
    if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['cpbase'])) {
        $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['cpbase'] = 'EXT:cpbase/Configuration/RTE/CpBase.yaml';
    }
} catch (ExtensionConfigurationExtensionNotConfiguredException|ExtensionConfigurationPathDoesNotExistException $e) {
}

// In cpbase verwendete Icons laden
$iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);
// DokTypes laden
$cpCustomDoktypes = \Conpassione\Cpbase\PageConfiguration::getCpDoktypes();

ExtensionManagementUtility::addUserTSConfig('options.pageTree.doktypesToShowInNewPageDragArea = 1');

foreach ($cpCustomDoktypes as $dokType => $dokTypeValue) {
    $iconRegistry->registerIcon(
        'apps-pagetree-' . $dokTypeValue[1] . '-default',
        SvgIconProvider::class,
        ['source' => 'EXT:cpbase/Resources/Public/Icons/apps-pagetree-' . $dokTypeValue[1] . '-default.svg']
    );

    $iconRegistry->registerIcon(
        'apps-pagetree-' . $dokTypeValue[1] . '-hideinmenu',
        SvgIconProvider::class,
        ['source' => 'EXT:cpbase/Resources/Public/Icons/apps-pagetree-' . $dokTypeValue[1] . '-hideinmenu.svg']
    );

    $iconRegistry->registerIcon(
        'apps-pagetree-' . $dokTypeValue[1] . '-root',
        SvgIconProvider::class,
        ['source' => 'EXT:cpbase/Resources/Public/Icons/apps-pagetree-' . $dokTypeValue[1] . '-root.svg']
    );

    ExtensionManagementUtility::addUserTSConfig('options.pageTree.doktypesToShowInNewPageDragArea := addToList(' . $dokType . ')');
}

// Remove the doktypes we do not use
ExtensionManagementUtility::addUserTSConfig('options.pageTree.doktypesToShowInNewPageDragArea := addToList(3,4,254)');
// ExtensionManagementUtility::addUserTSConfig('options.pageTree.doktypesToShowInNewPageDragArea := removeFromList(6,7,199,255)');

