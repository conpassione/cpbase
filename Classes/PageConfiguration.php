<?php

/**
 *  Diese Datei enthält die Konstanten für die neuen Seiten
 *  (c) by conPassione gmbh
 **/

declare(strict_types=1);

namespace Conpassione\Cpbase;

/*
 * This file is part of TYPO3 CMS-extension cpbase by conPassione gmbh.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 */

/**
 * This project has specific backend layouts based on the page type,
 * which is mapped in here.
 */
class PageConfiguration
{
    public const DOKTYPE_STARTPAGE = 70;
    public const DOKTYPE_PRODPAGE = 71;

    public static function getCpDoktypes(): array
    {
        static $cp_dokTypes = [
            self::DOKTYPE_STARTPAGE => ['LLL:EXT:cpbase/Resources/Private/Language/locallang.xlf:page.doktype.70', 'page-start'],
            self::DOKTYPE_PRODPAGE => ['LLL:EXT:cpbase/Resources/Private/Language/locallang.xlf:page.doktype.71', 'page-prod'],
        ];
        return $cp_dokTypes;
    }
}
