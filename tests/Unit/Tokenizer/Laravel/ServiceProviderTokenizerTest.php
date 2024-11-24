<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ServiceProvider;
use BaseCodeOy\Arch\Tokenizer\Laravel\ServiceProviderTokenizer;

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
