<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Facade;

use BombenProdukt\Arch\Contract\EnvironmentInterface;
use BombenProdukt\Arch\Environment\GeneratorRepository;
use BombenProdukt\Arch\Environment\StatementRepository;
use BombenProdukt\Arch\Environment\TokenizerRepository;
use Illuminate\Support\Facades\Facade;

/**
 * @method static GeneratorRepository generators()
 * @method static StatementRepository statements()
 * @method static TokenizerRepository tokenizers()
 */
final class Environment extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return EnvironmentInterface::class;
    }
}
