<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\ResourceTokenizer;

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
