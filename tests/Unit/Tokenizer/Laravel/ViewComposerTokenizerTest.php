<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ViewComposer;
use BaseCodeOy\Arch\Tokenizer\Laravel\ViewComposerTokenizer;

it('returns an empty array when no view composers are provided', function (): void {
    $tokenizer = new ViewComposerTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated view composers when view composers are provided', function (): void {
    $tokenizer = new ViewComposerTokenizer();

    $tokens = [
        'viewComposers' => [
            'home',
            'about',
            'contact',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['viewComposers'])->toBeArray()->toHaveCount(3);

    expect($result['viewComposers'][0])->toBeInstanceOf(ViewComposer::class);
    expect($result['viewComposers'][0]->name())->toBe('Home');

    expect($result['viewComposers'][1])->toBeInstanceOf(ViewComposer::class);
    expect($result['viewComposers'][1]->name())->toBe('About');

    expect($result['viewComposers'][2])->toBeInstanceOf(ViewComposer::class);
    expect($result['viewComposers'][2]->name())->toBe('Contact');
});
