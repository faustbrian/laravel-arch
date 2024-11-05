<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Tokenizer\Laravel\Nova\MetricTokenizer;

it('returns an empty array when no novaMetrics are provided', function (): void {
    $tokenizer = new MetricTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated novaMetrics when novaMetrics are provided', function (): void {
    $tokenizer = new MetricTokenizer();

    $tokens = [
        'nova' => [
            'metrics' => [
                'test' => ['type' => 'valueMetric'],
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['metrics'][0]->name())->toBe('Test');
    expect($result['nova']['metrics'][0]->type())->toBe('valueMetric');
});
