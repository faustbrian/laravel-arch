<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Facade;

use BaseCodeOy\Arch\Contract\ParserInterface;
use BaseCodeOy\Arch\Model\Manifest;
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
