<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\FactoryTokenizer;

it('returns an empty array when no factories are provided', function (): void {
    $tokenizer = new FactoryTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated factories when factories are provided', function (): void {
    $tokenizer = new FactoryTokenizer();

    $tokens = [
        'factories' => ['test1', 'test2'],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['factories'][0]->name())->toBe('Test1');
    expect($result['factories'][1]->name())->toBe('Test2');
});
