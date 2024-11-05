<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Renderer;

use BaseCodeOy\Arch\Contract\ClassRendererInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static string render(string $path, array $context)
 */
final class ClassRenderer extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ClassRendererInterface::class;
    }
}
