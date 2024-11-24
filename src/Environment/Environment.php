<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

use BaseCodeOy\Arch\Contract\EnvironmentInterface;

final class Environment implements EnvironmentInterface
{
    public function __construct(
        private readonly GeneratorRepository $generatorRepository,
        private readonly StatementRepository $statementRepository,
        private readonly TokenizerRepository $tokenizerRepository,
    ) {}

    public function generators(): GeneratorRepository
    {
        return $this->generatorRepository;
    }

    public function statements(): StatementRepository
    {
        return $this->statementRepository;
    }

    public function tokenizers(): TokenizerRepository
    {
        return $this->tokenizerRepository;
    }
}
