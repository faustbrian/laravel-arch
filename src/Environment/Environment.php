<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Environment;

use BaseCodeOy\Arch\Contract\EnvironmentInterface;

final readonly class Environment implements EnvironmentInterface
{
    public function __construct(
        private GeneratorRepository $generatorRepository,
        private StatementRepository $statementRepository,
        private TokenizerRepository $tokenizerRepository,
    ) {}

    #[\Override()]
    public function generators(): GeneratorRepository
    {
        return $this->generatorRepository;
    }

    #[\Override()]
    public function statements(): StatementRepository
    {
        return $this->statementRepository;
    }

    #[\Override()]
    public function tokenizers(): TokenizerRepository
    {
        return $this->tokenizerRepository;
    }
}
