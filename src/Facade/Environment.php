<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Facade;

use BaseCodeOy\Arch\Contract\EnvironmentInterface;
use BaseCodeOy\Arch\Environment\GeneratorRepository;
use BaseCodeOy\Arch\Environment\StatementRepository;
use BaseCodeOy\Arch\Environment\TokenizerRepository;
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
