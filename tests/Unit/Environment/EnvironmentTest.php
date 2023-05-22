<?php

declare(strict_types=1);

namespace Tests\Unit\Environment;

use BombenProdukt\Arch\Environment\Environment;
use BombenProdukt\Arch\Environment\GeneratorRepository;
use BombenProdukt\Arch\Environment\StatementRepository;
use BombenProdukt\Arch\Environment\TokenizerRepository;

it('returns the correct repositories', function (): void {
    $environment = new Environment(
        new GeneratorRepository(),
        new StatementRepository(),
        new TokenizerRepository(),
    );

    expect($environment->generators())->toBeInstanceOf(GeneratorRepository::class);
    expect($environment->statements())->toBeInstanceOf(StatementRepository::class);
    expect($environment->tokenizers())->toBeInstanceOf(TokenizerRepository::class);
});
