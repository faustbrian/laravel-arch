<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Tokenizer\Laravel\Nova\DashboardTokenizer;

it('returns an empty array when no novaDashboards are provided', function (): void {
    $tokenizer = new DashboardTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated novaDashboards when novaDashboards are provided', function (): void {
    $tokenizer = new DashboardTokenizer();

    $tokens = [
        'nova' => [
            'dashboards' => [
                'test1', 'test2',
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['dashboards'][0]->name())->toBe('Test1');
    expect($result['nova']['dashboards'][1]->name())->toBe('Test2');
});
