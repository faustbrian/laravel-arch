<?php

declare(strict_types=1);

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
