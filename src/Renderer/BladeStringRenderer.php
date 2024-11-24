<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\StringRendererInterface;
use Illuminate\Support\Facades\Blade;

final readonly class BladeStringRenderer implements StringRendererInterface
{
    public function render(string $template, array $context): string
    {
        return Blade::render(
            string: $template,
            data: $context,
            deleteCachedView: true,
        );
    }
}
