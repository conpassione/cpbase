<?php

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
    public const DOKTYPE_STARTPAGE = 210;

    public static function getCpDoktypes(): array
    {
        static $cp_dokTypes = [self::DOKTYPE_STARTPAGE => ['Startseite', 'page-start']];
        return $cp_dokTypes;
    }
}
