<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Tokenizer\Laravel\FactoryTokenizer;

it('returns an empty array when no factories are provided', function (): void {
    $tokenizer = new FactoryTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated factories when factories are provided', function (): void {
    $tokenizer = new FactoryTokenizer();

    $tokens = [
        'factories' => ['test1', 'test2'],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['factories'][0]->name())->toBe('Test1');
    expect($result['factories'][1]->name())->toBe('Test2');
});
