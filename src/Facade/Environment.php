<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
    #[\Override()]
    protected static function getFacadeAccessor(): string
    {
        return EnvironmentInterface::class;
    }
}
