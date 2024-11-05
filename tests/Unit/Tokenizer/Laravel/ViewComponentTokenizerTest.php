<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ViewComponent;
use BaseCodeOy\Arch\Tokenizer\Laravel\ViewComponentTokenizer;

it('returns an empty array when no view components are provided', function (): void {
    $tokenizer = new ViewComponentTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated view components when view components are provided', function (): void {
    $tokenizer = new ViewComponentTokenizer();

    $tokens = [
        'viewComponents' => [
            'headerComponent',
            'footerComponent',
            'sidebarComponent',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['viewComponents'])->toBeArray()->toHaveCount(3);

    expect($result['viewComponents'][0])->toBeInstanceOf(ViewComponent::class);
    expect($result['viewComponents'][0]->name())->toBe('HeaderComponent');

    expect($result['viewComponents'][1])->toBeInstanceOf(ViewComponent::class);
    expect($result['viewComponents'][1]->name())->toBe('FooterComponent');

    expect($result['viewComponents'][2])->toBeInstanceOf(ViewComponent::class);
    expect($result['viewComponents'][2]->name())->toBe('SidebarComponent');
});
