<?php

/**
 * Diese Datei enthält ide Definitionen für die neuen Seitentypen
 * (c) by conPassione gmbh
 **/

use Conpassione\Cpbase\PageConfiguration;
use TYPO3\CMS\Core\Domain\Repository\PageRepository;
use TYPO3\CMS\Core\Utility\ArrayUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][1][0] = 'Inhaltsseite';

// dokTypes laden
$cpCustomDoktypes = PageConfiguration::getCpDoktypes();

foreach ($cpCustomDoktypes as $dokType => $dokTypeValue) {
    ExtensionManagementUtility::addTcaSelectItem(
        'pages',
        'doktype',
        [
            $dokTypeValue[0],
            $dokType,
            'apps-pagetree-' . $dokTypeValue[1] . '-default',
            'default',
        ],
        '1',
        'after'
    );

    ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA']['pages'],
        [
            'ctrl' => [
                'typeicon_classes' => [
                    $dokType => 'apps-pagetree-' . $dokTypeValue[1] . '-default',
                    $dokType . '-contentFromPid' => 'apps-pagetree-' . $dokTypeValue[1] . '-default',
                    $dokType . '-root' => 'apps-pagetree-' . $dokTypeValue[1] . '-root',
                    $dokType . '-hideinmenu' => 'apps-pagetree-' . $dokTypeValue[1] . '-hideinmenu',
                ],
            ],
            'types' => [
                $dokType => [
                    'showitem' => $GLOBALS['TCA']['pages']['types'][PageRepository::DOKTYPE_DEFAULT]['showitem'],
                ],
            ],
        ],
    );
}
