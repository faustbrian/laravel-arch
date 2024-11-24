<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\CastableTokenizer;

it('returns an empty array when no castables are provided', function (): void {
    $tokenizer = new CastableTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated castables when castables are provided', function (): void {
    $tokenizer = new CastableTokenizer();

    $tokens = [
        'castables' => [
            'test' => [
                'castsAttributes' => false,
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['castables'][0]->name())->toBe('Test');
    expect($result['castables'][0]->castsAttributes())->toBeFalse();
});

it('assigns correct default value to castsAttributes when not provided', function (): void {
    $tokenizer = new CastableTokenizer();

    $tokens = [
        'castables' => [
            'test' => [],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['castables'][0]->name())->toBe('Test');
    expect($result['castables'][0]->castsAttributes())->toBeFalse();
});
