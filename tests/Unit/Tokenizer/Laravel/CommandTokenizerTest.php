<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\CommandTokenizer;

it('returns an empty array when no commands are provided', function (): void {
    $tokenizer = new CommandTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated commands when commands are provided', function (): void {
    $tokenizer = new CommandTokenizer();

    $tokens = [
        'commands' => [
            'test' => [
                'signature' => 'test:command',
                'description' => 'This is a test command',
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['commands'][0]->name())->toBe('Test');
    expect($result['commands'][0]->signature())->toBe('test:command');
    expect($result['commands'][0]->description())->toBe('This is a test command');
});
