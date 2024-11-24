<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\CastTokenizer;

it('returns an empty array when no casts are provided', function (): void {
    $tokenizer = new CastTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated casts when casts are provided', function (): void {
    $tokenizer = new CastTokenizer();

    $tokens = [
        'casts' => [
            'test' => [
                'inbound' => true,
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['casts'][0]->name())->toBe('Test');
    expect($result['casts'][0]->inbound())->toBeTrue();
});

it('assigns correct default value to inbound when not provided', function (): void {
    $tokenizer = new CastTokenizer();

    $tokens = [
        'casts' => [
            'test' => [],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['casts'][0]->name())->toBe('Test');
    expect($result['casts'][0]->inbound())->toBeFalse();
});
