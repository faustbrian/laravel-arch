<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel\Nova;

use BombenProdukt\Arch\Tokenizer\Laravel\Nova\ActionTokenizer;

it('returns an empty array when no novaActions are provided', function (): void {
    $tokenizer = new ActionTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated novaActions when novaActions are provided', function (): void {
    $tokenizer = new ActionTokenizer();

    $tokens = [
        'nova' => [
            'actions' => [
                'test' => [
                    'shouldBeDestructive' => true,
                    'shouldBeQueued' => false,
                ],
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['actions'][0]->name())->toBe('Test');
    expect($result['nova']['actions'][0]->shouldBeDestructive())->toBeTrue();
    expect($result['nova']['actions'][0]->shouldBeQueued())->toBeFalse();
});

it('assigns correct default values to shouldBeDestructive and shouldBeQueued when not provided', function (): void {
    $tokenizer = new ActionTokenizer();

    $tokens = [
        'nova' => [
            'actions' => [
                'test' => [],
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['actions'][0]->name())->toBe('Test');
    expect($result['nova']['actions'][0]->shouldBeDestructive())->toBeFalse();
    expect($result['nova']['actions'][0]->shouldBeQueued())->toBeFalse();
});

it('correctly assigns name when only value is provided', function (): void {
    $tokenizer = new ActionTokenizer();

    $tokens = [
        'nova' => [
            'actions' => [
                'test',
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['nova']['actions'][0]->name())->toBe('Test');
    expect($result['nova']['actions'][0]->shouldBeDestructive())->toBeFalse();
    expect($result['nova']['actions'][0]->shouldBeQueued())->toBeFalse();
});
