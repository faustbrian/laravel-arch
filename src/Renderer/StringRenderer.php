<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\StringRendererInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string render(string $template, array $context)
 */
final class StringRenderer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return StringRendererInterface::class;
    }
}
