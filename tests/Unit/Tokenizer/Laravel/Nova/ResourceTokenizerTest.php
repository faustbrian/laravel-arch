<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel\Nova;

use BombenProdukt\Arch\Tokenizer\Laravel\Nova\ResourceTokenizer;

it('returns an empty array when no novaResources are provided', function (): void {
    $tokenizer = new ResourceTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated novaResources when novaResources are provided', function (): void {
    $tokenizer = new ResourceTokenizer();

    $tokens = [
        'nova' => [
            'resources' => [
                'test1', 'test2',
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['resources'][0]->name())->toBe('Test1');
    expect($result['nova']['resources'][1]->name())->toBe('Test2');
});
