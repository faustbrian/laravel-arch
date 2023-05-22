<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use BombenProdukt\Arch\Contract\FileRendererInterface;
use Illuminate\Support\Facades\File;

final readonly class TwigFileRenderer implements FileRendererInterface
{
    public function render(string $path, array $context): string
    {
        return (new TwigStringRenderer())->render(File::stub("{$path}.twig"), $context);
    }
}
