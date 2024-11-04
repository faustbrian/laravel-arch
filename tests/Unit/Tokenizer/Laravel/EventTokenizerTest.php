<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\EventTokenizer;

it('returns an empty array when no events are provided', function (): void {
    $tokenizer = new EventTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated events when events are provided', function (): void {
    $tokenizer = new EventTokenizer();

    $tokens = [
        'events' => [
            'test' => [
                'shouldBroadcast' => true,
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['events'][0]->name())->toBe('Test');
    expect($result['events'][0]->shouldBroadcast())->toBe(true);
});

it('sets shouldBroadcast to false when not provided', function (): void {
    $tokenizer = new EventTokenizer();

    $tokens = [
        'events' => [
            'test' => [],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['events'][0]->name())->toBe('Test');
    expect($result['events'][0]->shouldBroadcast())->toBe(false);
});
