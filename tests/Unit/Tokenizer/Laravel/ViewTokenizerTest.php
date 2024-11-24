<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\View;
use BaseCodeOy\Arch\Tokenizer\Laravel\ViewTokenizer;

it('returns an empty array when no views are provided', function (): void {
    $tokenizer = new ViewTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated views when views are provided', function (): void {
    $tokenizer = new ViewTokenizer();

    $tokens = [
        'views' => [
            'home',
            'about',
            'contact',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['views'])->toBeArray()->toHaveCount(3);

    expect($result['views'][0])->toBeInstanceOf(View::class);
    expect($result['views'][0]->name())->toBe('home');

    expect($result['views'][1])->toBeInstanceOf(View::class);
    expect($result['views'][1]->name())->toBe('about');

    expect($result['views'][2])->toBeInstanceOf(View::class);
    expect($result['views'][2]->name())->toBe('contact');
});
