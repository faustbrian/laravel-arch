<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Tokenizer\Laravel\Nova\FilterTokenizer;

it('returns an empty array when no novaFilters are provided', function (): void {
    $tokenizer = new FilterTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated novaFilters when novaFilters are provided', function (): void {
    $tokenizer = new FilterTokenizer();

    $tokens = [
        'nova' => [
            'filters' => [
                'test' => 'filterType',
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['filters'][0]->name())->toBe('Test');
    expect($result['nova']['filters'][0]->type())->toBe('filterType');
});

it('assigns name and default type when only value is provided', function (): void {
    $tokenizer = new FilterTokenizer();

    $tokens = [
        'nova' => [
            'filters' => [
                'test',
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['filters'][0]->name())->toBe('Test');
    expect($result['nova']['filters'][0]->type())->toBe('filter');
});
