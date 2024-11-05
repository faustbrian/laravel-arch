<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\PolicyTokenizer;

it('returns an empty array when no policies are provided', function (): void {
    $tokenizer = new PolicyTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated policies when policies are provided', function (): void {
    $tokenizer = new PolicyTokenizer();

    $tokens = [
        'policies' => [
            'UserPolicy',
            'ProductPolicy',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['policies'][0]->name())->toBe('User');
    expect($result['policies'][1]->name())->toBe('Product');
});
