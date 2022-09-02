<?php
/*
 #---------------------------------------------------------------
 # ext_tables file for ext cpbase
 #
 # Generated 01.06.2020 by www.conpassione.ch
 #---------------------------------------------------------------
 */

defined('TYPO3') or die('Access denied.');

(function () {
    $GLOBALS['TBE_STYLES']['skins']['cpbase']['name'] = 'cpbase';
    $GLOBALS['TBE_STYLES']['skins']['cpbase']['stylesheetDirectories']['cpbase_additional'] = 'EXT:cpbase/Resources/Public/Backend/Css/Skin/';

    // Build or own drop in flyout menu for creating new pages, in the order we prefer
    $allDoktypesForFlyoutMenu = [
        \B13\SiteT3demo\PageConfiguration::DOKTYPE_CONTENTPAGE,
        \B13\SiteT3demo\PageConfiguration::DOKTYPE_STARTPAGE,
        \TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_SHORTCUT,
        \TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_LINK,
        \TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_SYSFOLDER,
    ];
    \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addUserTSConfig(
        'options.pageTree.doktypesToShowInNewPageDragArea = ' . implode(',', $allDoktypesForFlyoutMenu)
    );

})();

?>
