<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Tokenizer\Laravel\Nova\ResourceTokenizer;

it('returns an empty array when no novaResources are provided', function (): void {
    $tokenizer = new ResourceTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated novaResources when novaResources are provided', function (): void {
    $tokenizer = new ResourceTokenizer();

    $tokens = [
        'nova' => [
            'resources' => [
                'test1', 'test2',
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['resources'][0]->name())->toBe('Test1');
    expect($result['nova']['resources'][1]->name())->toBe('Test2');
});
