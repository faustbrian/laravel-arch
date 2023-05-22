<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\ServiceProvider;
use BombenProdukt\Arch\Tokenizer\Laravel\ServiceProviderTokenizer;

it('returns an empty array when no service providers are provided', function (): void {
    $tokenizer = new ServiceProviderTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated service providers when service providers are provided', function (): void {
    $tokenizer = new ServiceProviderTokenizer();

    $tokens = [
        'serviceProviders' => [
            'AppServiceProvider',
            'AuthServiceProvider',
            'BroadcastServiceProvider',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['serviceProviders'])->toBeArray()->toHaveCount(3);

    expect($result['serviceProviders'][0])->toBeInstanceOf(ServiceProvider::class);
    expect($result['serviceProviders'][0]->name())->toBe('App');

    expect($result['serviceProviders'][1])->toBeInstanceOf(ServiceProvider::class);
    expect($result['serviceProviders'][1]->name())->toBe('Auth');

    expect($result['serviceProviders'][2])->toBeInstanceOf(ServiceProvider::class);
    expect($result['serviceProviders'][2]->name())->toBe('Broadcast');
});
