<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Tokenizer\Laravel\CastableTokenizer;

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
