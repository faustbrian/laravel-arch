<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\FileRendererInterface;
use Illuminate\Support\Facades\File;

final readonly class BladeFileRenderer implements FileRendererInterface
{
    public function render(string $path, array $context): string
    {
        return (new BladeStringRenderer())->render(File::stub("{$path}.blade.php"), $context);
    }
}
