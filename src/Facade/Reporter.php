<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Facade;

use BombenProdukt\Arch\Contract\ReporterInterface;
use BombenProdukt\Arch\Model\GeneratorResult;
use BombenProdukt\Arch\Reporter\Report;
use Illuminate\Support\Facades\Facade;

/**
 * @method static GeneratorResult decode(string $path)
 * @method static Report          encode(GeneratorResult $result)
 */
final class Reporter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ReporterInterface::class;
    }
}
