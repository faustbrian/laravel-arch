<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\ResourceCollectionTokenizer;

it('returns an empty array when no resource collections are provided', function (): void {
    $tokenizer = new ResourceCollectionTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated resource collections when resource collections are provided', function (): void {
    $tokenizer = new ResourceCollectionTokenizer();

    $tokens = [
        'resourceCollections' => [
            'UserCollection',
            'ProductCollection',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['resourceCollections'][0]->name())->toBe('User');
    expect($result['resourceCollections'][1]->name())->toBe('Product');
});
