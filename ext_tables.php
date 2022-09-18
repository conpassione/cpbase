<?php
/*
 #---------------------------------------------------------------
 # ext_tables file for ext cpbase
 #
 # Generated 01.06.2020 by www.conpassione.ch
 #---------------------------------------------------------------
 */

defined('TYPO3') or die('Access denied.');

(static function () {
    $GLOBALS['TBE_STYLES']['skins']['cpbase']['name'] = 'cpbase';
    $GLOBALS['TBE_STYLES']['skins']['cpbase']['stylesheetDirectories']['cpbase_additional'] = 'EXT:cpbase/Resources/Public/Backend/Css/Skin/';

    $cpCustomDoktypes[] = \Conpassione\Cpbase\PageConfiguration::getCpDoktypes();

    foreach ($cpCustomDoktypes as $dokType => $dokTypeValue) {
        $GLOBALS['PAGES_TYPES'][$dokType] = [
            'type' => 'web',
            'allowedTables' => '*',
        ];
    }
})();
