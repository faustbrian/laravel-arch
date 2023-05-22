<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Tokenizer\Laravel\PivotTokenizer;

it('returns an empty array when no pivots are provided', function (): void {
    $tokenizer = new PivotTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated pivots when pivots are provided', function (): void {
    $tokenizer = new PivotTokenizer();

    $tokens = [
        'pivots' => [
            'UserProduct',
            'UserTag',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['pivots'][0]->name())->toBe('UserProduct');
    expect($result['pivots'][1]->name())->toBe('UserTag');
});
