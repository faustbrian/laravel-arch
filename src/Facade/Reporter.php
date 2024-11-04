<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Facade;

use BaseCodeOy\Arch\Contract\ReporterInterface;
use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Reporter\Report;
use Illuminate\Support\Facades\Facade;

/**
 * @method static GeneratorResult decode()
 * @method static Report          encode(GeneratorResult $result)
 * @method static bool            exists()
 */
final class Reporter extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return ReporterInterface::class;
    }
}
