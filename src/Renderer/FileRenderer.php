<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\FileRendererInterface;
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
