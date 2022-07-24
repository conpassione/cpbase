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

if (!defined('TYPO3_MODE')) {
    die ('Access denied.');
}

// Vorberitung Konfiguration
$extConf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class)->get('cpbase');

// BE-Login konfigurieren
/*if (TYPO3_MODE === 'BE') {
	if ($extConf['useDefaultBELoginSkin']) {
		$beExtConf = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Configuration\ExtensionConfiguration::class);

		$beConf = $beExtConf->get('backend');

		if ($beConf['loginLogo']=='') {
			$beConf['loginLogo'] = 'EXT:cpbase/Resources/Public/Images/Logo_cp_grau.png';
		}
		if ($beConf['loginHighlightColor']=='') {
			$beConf['loginHighlightColor'] = '#009ee1';
		}
		if ($beConf['loginBackgroundImage']=='') {
			$beConf['loginBackgroundImage'] = 'EXT:cpbase/Resources/Public/Images/bglogin.svg';
		}

    	$http_host = $_SERVER['HTTP_HOST'];
		$host = explode('.', $http_host);

		if(\TYPO3\CMS\Core\Core\Environment::getContext() == 'Development') {
			$beConf['backendLogo'] = 'EXT:cpbase/Resources/Public/Icons/alfabeta.svg';
		} else {
			$beConf['backendLogo'] = '';
		}

		$GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['backend'] = $beConf;
	}
};*/


//if (($extConf['useDefaultBackendConfig']) || ($extConf['useDefaultFrontendConfig'])){
	// Typoscript konfigurieren
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig('
		@import "EXT:cpbase/Configuration/TSconfig/Page/setup.tsconfig"
	');

	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig('
	        @import "EXT:cpbase/Configuration/TSconfig/User/DefaultUser.tsconfig">
	');

	// CK-Editor Konfiguration laden
	if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['cpbase'])) {
	    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['cpbase'] = 'EXT:cpbase/Configuration/RTE/CpBase.yaml';
	}
//}

// In cpbase verwendete Icons laden
$iconRegistry = \TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance(\TYPO3\CMS\Core\Imaging\IconRegistry::class);

$iconRegistry->registerIcon(
	'cp-ge5050',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/ge5050.svg']
);

$iconRegistry->registerIcon(
	'cp-ge3366',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/ge3366.svg']
);

$iconRegistry->registerIcon(
	'cp-ge6633',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/ge6633.svg']
);

$iconRegistry->registerIcon(
	'cp-ge333333',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/ge333333.svg']
);

$iconRegistry->registerIcon(
	'cp-ge252550',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/ge252550.svg']
);

$iconRegistry->registerIcon(
	'cp-geslider',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/geslider.svg']
);

$iconRegistry->registerIcon(
	'cp-geboxcontainer',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/geboxcontainer.svg']
);

$iconRegistry->registerIcon(
	'cp-gebox',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/gebox.svg']
);

$iconRegistry->registerIcon(
	'cp-geacccontainer',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/geacccontainer.svg']
);

$iconRegistry->registerIcon(
	'cp-geacc',
	\TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider::class,
	['source' => 'EXT:cpbase/Resources/Public/Icons/geacc.svg']
);
?>