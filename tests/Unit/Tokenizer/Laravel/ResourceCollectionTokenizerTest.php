<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

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
