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

use Exception;

/**
 * This project has specific backend layouts based on the page type,
 * which is mapped in here.
 */
class PageConfiguration
{
    public const DOKTYPE_CONTENTPAGE = 1;
    public const DOKTYPE_STARTPAGE = 366510;

    protected array $backendLayoutMapping = [
        self::DOKTYPE_CONTENTPAGE => 'pagets__Contentpage',
        self::DOKTYPE_STARTPAGE => 'pagets__Startpage',
    ];

    public function getBackendLayout(int $doktype): string
    {
        if (empty($this->backendLayoutMapping[$doktype])) {
            throw new Exception('No backend layout mapping for doktype ' . $doktype, 1553253111);
        }
        return $this->backendLayoutMapping[$doktype];
    }
}
