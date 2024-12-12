<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Facade;

use BaseCodeOy\Arch\Contract\ParserInterface;
use BaseCodeOy\Arch\Model\Manifest;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Manifest parse(string $path)
 */
final class Parser extends Facade
{
    #[\Override()]
    protected static function getFacadeAccessor(): string
    {
        return ParserInterface::class;
    }
}
