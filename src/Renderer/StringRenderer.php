<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use BombenProdukt\Arch\Contract\StringRendererInterface;
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
