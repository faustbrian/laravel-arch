<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Environment\GeneratorRepository;
use BaseCodeOy\Arch\Environment\StatementRepository;
use BaseCodeOy\Arch\Environment\TokenizerRepository;

interface EnvironmentInterface
{
    public function generators(): GeneratorRepository;

    public function statements(): StatementRepository;

    public function tokenizers(): TokenizerRepository;
}
