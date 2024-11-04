<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\ObserverTokenizer;

it('returns an empty array when no observers are provided', function (): void {
    $tokenizer = new ObserverTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated observers when observers are provided', function (): void {
    $tokenizer = new ObserverTokenizer();

    $tokens = [
        'observers' => [
            'UserObserver' => [
                'plain' => false,
            ],
            'ProductObserver' => [
                'plain' => true,
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['observers'][0]->name())->toBe('User');
    expect($result['observers'][0]->plain())->toBe(false);

    expect($result['observers'][1]->name())->toBe('Product');
    expect($result['observers'][1]->plain())->toBe(true);
});
