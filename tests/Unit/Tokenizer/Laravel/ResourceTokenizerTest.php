<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Tokenizer\Laravel\ResourceTokenizer;

it('returns an empty array when no resources are provided', function (): void {
    $tokenizer = new ResourceTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated resources when resources are provided', function (): void {
    $tokenizer = new ResourceTokenizer();

    $tokens = [
        'resources' => [
            'UserResource',
            'ProductResource',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['resources'][0]->name())->toBe('User');
    expect($result['resources'][1]->name())->toBe('Product');
});
