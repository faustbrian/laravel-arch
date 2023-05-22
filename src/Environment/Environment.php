<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Environment;

use BombenProdukt\Arch\Contract\EnvironmentInterface;

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
