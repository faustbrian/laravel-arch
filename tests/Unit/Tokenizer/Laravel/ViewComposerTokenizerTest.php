<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\ViewComposer;
use BombenProdukt\Arch\Tokenizer\Laravel\ViewComposerTokenizer;

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
