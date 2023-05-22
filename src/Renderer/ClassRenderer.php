<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use BombenProdukt\Arch\Contract\ClassRendererInterface;
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
