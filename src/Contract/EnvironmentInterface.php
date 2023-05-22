<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

use BombenProdukt\Arch\Environment\GeneratorRepository;
use BombenProdukt\Arch\Environment\StatementRepository;
use BombenProdukt\Arch\Environment\TokenizerRepository;

interface EnvironmentInterface
{
    public function generators(): GeneratorRepository;

    public function statements(): StatementRepository;

    public function tokenizers(): TokenizerRepository;
}
