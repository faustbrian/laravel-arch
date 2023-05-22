<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Facade;

use BombenProdukt\Arch\Contract\ParserInterface;
use BombenProdukt\Arch\Model\Manifest;
use Illuminate\Support\Facades\Facade;

/**
 * @method static Manifest parse(string $path)
 */
final class Parser extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ParserInterface::class;
    }
}
