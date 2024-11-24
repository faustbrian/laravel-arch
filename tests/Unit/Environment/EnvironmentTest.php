<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Environment;

use BaseCodeOy\Arch\Environment\Environment;
use BaseCodeOy\Arch\Environment\GeneratorRepository;
use BaseCodeOy\Arch\Environment\StatementRepository;
use BaseCodeOy\Arch\Environment\TokenizerRepository;

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
