<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\FormRequestTokenizer;

it('returns an empty array when no form requests are provided', function (): void {
    $tokenizer = new FormRequestTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated form requests when form requests are provided', function (): void {
    $tokenizer = new FormRequestTokenizer();

    $tokens = [
        'formRequests' => ['test1', 'test2'],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['formRequests'][0]->name())->toBe('Test1');
    expect($result['formRequests'][1]->name())->toBe('Test2');
});
