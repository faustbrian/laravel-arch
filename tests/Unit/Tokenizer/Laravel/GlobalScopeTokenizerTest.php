<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\GlobalScopeTokenizer;

it('returns an empty array when no global scopes are provided', function (): void {
    $tokenizer = new GlobalScopeTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated global scopes when global scopes are provided', function (): void {
    $tokenizer = new GlobalScopeTokenizer();

    $tokens = [
        'globalScopes' => ['test1', 'test2'],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['globalScopes'][0]->name())->toBe('Test1');
    expect($result['globalScopes'][1]->name())->toBe('Test2');
});
