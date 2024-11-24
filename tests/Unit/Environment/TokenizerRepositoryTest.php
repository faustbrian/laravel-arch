<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Environment;

use BaseCodeOy\Arch\Environment\TokenizerRepository;

it('returns all tokenizers', function (): void {
    $tokenizerRepository = new TokenizerRepository();

    $tokenizerRepository->add('My\\Full\\Qualified\\Class\\Name1');
    $tokenizerRepository->add('My\\Full\\Qualified\\Class\\Name2');

    expect($tokenizerRepository->all())->toBeArray()->and($tokenizerRepository->all())->toHaveCount(2);
});

it('adds a new tokenizer', function (): void {
    $tokenizerRepository = new TokenizerRepository();

    $tokenizerRepository->add('My\\Full\\Qualified\\Class\\Name');

    expect($tokenizerRepository->all())->toBeArray()->and($tokenizerRepository->all())->toHaveCount(1);
});
