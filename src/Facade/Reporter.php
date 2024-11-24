<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Facade;

use BaseCodeOy\Arch\Contract\ReporterInterface;
use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Reporter\Report;
use Illuminate\Support\Facades\Facade;

/**
 * @method static GeneratorResult decode()
 * @method static Report          encode(GeneratorResult $result)
 * @method static bool            exists()
 */
final class Reporter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ReporterInterface::class;
    }
}
