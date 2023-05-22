<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use BombenProdukt\Arch\Contract\FileRendererInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string render(string $path, array $context)
 */
final class FileRenderer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return FileRendererInterface::class;
    }
}
