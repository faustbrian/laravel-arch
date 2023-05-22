<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\View;
use BombenProdukt\Arch\Tokenizer\Laravel\ViewTokenizer;

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
