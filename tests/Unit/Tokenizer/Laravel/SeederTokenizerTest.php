<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Seeder;
use BaseCodeOy\Arch\Tokenizer\Laravel\SeederTokenizer;

it('returns an empty array when no seeders are provided', function (): void {
    $tokenizer = new SeederTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated seeders when seeders are provided', function (): void {
    $tokenizer = new SeederTokenizer();

    $tokens = [
        'seeders' => [
            'UserSeeder',
            'ProductSeeder',
            'OrderSeeder',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['seeders'])->toBeArray()->toHaveCount(3);

    expect($result['seeders'][0])->toBeInstanceOf(Seeder::class);
    expect($result['seeders'][0]->name())->toBe('User');

    expect($result['seeders'][1])->toBeInstanceOf(Seeder::class);
    expect($result['seeders'][1]->name())->toBe('Product');

    expect($result['seeders'][2])->toBeInstanceOf(Seeder::class);
    expect($result['seeders'][2]->name())->toBe('Order');
});
