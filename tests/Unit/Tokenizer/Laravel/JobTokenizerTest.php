<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Tokenizer\Laravel\JobTokenizer;

it('returns an empty array when no jobs are provided', function (): void {
    $tokenizer = new JobTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated jobs when jobs are provided', function (): void {
    $tokenizer = new JobTokenizer();

    $tokens = [
        'jobs' => [
            'Something1' => [
                'shouldQueue' => true,
                'shouldBeUnique' => false,
            ],
            'Something2' => [
                'shouldQueue' => false,
                'shouldBeUnique' => true,
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['jobs'][0]->name())->toBe('Something1');
    expect($result['jobs'][0]->shouldQueue())->toBeTrue();
    expect($result['jobs'][0]->shouldBeUnique())->toBeFalse();

    expect($result['jobs'][1]->name())->toBe('Something2');
    expect($result['jobs'][1]->shouldQueue())->toBeFalse();
    expect($result['jobs'][1]->shouldBeUnique())->toBeTrue();
});
