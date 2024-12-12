<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\FileRendererInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string render(string $path, array $context)
 */
final class FileRenderer extends Facade
{
    #[\Override()]
    protected static function getFacadeAccessor(): string
    {
        return FileRendererInterface::class;
    }
}
