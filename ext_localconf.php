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

    // BE-Login konfigurieren

    if ($extConf['useDefaultBELoginSkin']) {
        $beExtConf = GeneralUtility::makeInstance(ExtensionConfiguration::class);

        $beConf = $beExtConf->get('backend');

        if ($beConf['loginLogo']==='') {
            $beConf['loginLogo'] = 'EXT:cpbase/Resources/Public/Images/Logo_cp_grau.png';
        }
        if ($beConf['loginHighlightColor']==='') {
            $beConf['loginHighlightColor'] = '#009ee1';
        }
        if ($beConf['loginBackgroundImage']==='') {
            $beConf['loginBackgroundImage'] = 'EXT:cpbase/Resources/Public/Images/bglogin.svg';
        }

        if (Environment::getContext() == 'Development') {
            $beConf['backendLogo'] = 'EXT:cpbase/Resources/Public/Icons/alfabeta.svg';
        } else {
            $beConf['backendLogo'] = '';
        }

        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['backend'] = $beConf;
    }


    if (($extConf['useDefaultBackendConfig']) || ($extConf['useDefaultFrontendConfig'])) {
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
    }
} catch (ExtensionConfigurationExtensionNotConfiguredException|ExtensionConfigurationPathDoesNotExistException $e) {
}

// In cpbase verwendete Icons laden
$iconRegistry = GeneralUtility::makeInstance(IconRegistry::class);

$iconRegistry->registerIcon(
    'cp-ge5050',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/ge5050.svg']
);

$iconRegistry->registerIcon(
    'cp-ge3366',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/ge3366.svg']
);

$iconRegistry->registerIcon(
    'cp-ge6633',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/ge6633.svg']
);

$iconRegistry->registerIcon(
    'cp-ge333333',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/ge333333.svg']
);

$iconRegistry->registerIcon(
    'cp-ge252550',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/ge252550.svg']
);

$iconRegistry->registerIcon(
    'cp-geslider',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/geslider.svg']
);

$iconRegistry->registerIcon(
    'cp-geboxcontainer',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/geboxcontainer.svg']
);

$iconRegistry->registerIcon(
    'cp-gebox',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/gebox.svg']
);

$iconRegistry->registerIcon(
    'cp-geacccontainer',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/geacccontainer.svg']
);

$iconRegistry->registerIcon(
    'cp-geacc',
    SvgIconProvider::class,
    ['source' => 'EXT:cpbase/Resources/Public/Icons/geacc.svg']
);
