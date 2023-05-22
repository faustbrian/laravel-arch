<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Tokenizer\Laravel\MiddlewareTokenizer;

it('returns an empty array when no middleware are provided', function (): void {
    $tokenizer = new MiddlewareTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated middleware when middleware are provided', function (): void {
    $tokenizer = new MiddlewareTokenizer();

    $tokens = [
        'middleware' => [
            'Something1',
            'Something2',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['middleware'][0]->name())->toBe('Something1');
    expect($result['middleware'][1]->name())->toBe('Something2');
});
