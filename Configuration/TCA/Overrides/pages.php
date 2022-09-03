<?php

use Conpassione\Cpbase\PageConfiguration;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

ExtensionManagementUtility::addTCAcolumns('pages', [
    'infotext_header' => [
        'l10n_mode' => 'exclude',
        'l10n_display' => 'defaultAsReadonly',
        'label' => 'Infotext-Titel',
        'exclude' => 1,
        'config' => [
            'type' => 'input',
            'size' => 50,
            'max' => 255,
        ],
    ],
    'infotext' => [
        'l10n_mode' => 'exclude',
        'l10n_display' => 'defaultAsReadonly',
        'label' => 'Infotext',
        'exclude' => 1,
        'description' => 'Wird im Header der Seite angezeigt',
        'config' => [
            'type' => 'text',
            'cols' => 80,
            'rows' => 15,
            'softref' => 'typolink_tag,email[subst],url',
            'enableRichtext' => true, // we can safely enable RTE for this field, there's no plan to use this as a plain text field
        ],
    ],
]);

$GLOBALS['TCA']['pages']['palettes']['infotext'] = [
    'label' => 'Infotext',
    'showitem' => 'infotext_header,
        --linebreak--,
        infotext',
];

ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    '--div--;Infotext,
                  --palette--;;infotext'
);


$GLOBALS['TCA']['pages']['columns']['doktype']['config']['items'][1][0] = 'Inhaltsseite';


// DokTypes laden
$cpCustomDoktypes = PageConfiguration::getCpDoktypes();

foreach ($cpCustomDoktypes as $dokType => $dokTypeValue) {
    ExtensionManagementUtility::addTcaSelectItem(
        'pages',
        'doktype',
        [
            $dokTypeValue[0],
            $dokType,
            'apps-pagetree-' . $dokTypeValue[1] . '-default',
            'default'
        ],
        '1',
        'after'
    );

    \TYPO3\CMS\Core\Utility\ArrayUtility::mergeRecursiveWithOverrule(
        $GLOBALS['TCA']['pages'],
        [
            'ctrl' => [
                'typeicon_classes' => [
                    $dokType => 'apps-pagetree-' . $dokTypeValue[1] . '-default',
                    $dokType . '-contentFromPid' => 'apps-pagetree-' . $dokTypeValue[1] . '-default',
                    $dokType . '-root' => 'apps-pagetree-' . $dokTypeValue[1] . '-root',
                    $dokType . '-hideinmenu' => 'apps-pagetree-' . $dokTypeValue[1] . '-hideinmenu',
                ]
            ],
            'types' => [
                $dokType => [
                    'showitem' => $GLOBALS['TCA']['pages']['types'][\TYPO3\CMS\Core\Domain\Repository\PageRepository::DOKTYPE_DEFAULT]['showitem']
                ]
            ]
        ]
    );
}

