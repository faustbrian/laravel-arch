<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Tokenizer\Laravel\MigrationTokenizer;

it('returns an empty array when no migrations are provided', function (): void {
    $tokenizer = new MigrationTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated migrations when migrations are provided', function (): void {
    $tokenizer = new MigrationTokenizer();

    $tokens = [
        'migrations' => [
            'create_users_table' => [
                'columns' => ['name', 'email', 'password'],
                'indexes' => ['email'],
            ],
            'create_posts_table' => [
                'columns' => ['title', 'body', 'user_id'],
                'indexes' => ['user_id'],
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['migrations'][0]->name())->toBe('create_users_table');
    expect($result['migrations'][0]->columns())->toBeArray();
    expect($result['migrations'][0]->columns())->toEqual(['name', 'email', 'password']);
    expect($result['migrations'][0]->indexes())->toBeArray();
    expect($result['migrations'][0]->indexes())->toEqual(['email']);

    expect($result['migrations'][1]->name())->toBe('create_posts_table');
    expect($result['migrations'][1]->columns())->toBeArray();
    expect($result['migrations'][1]->columns())->toEqual(['title', 'body', 'user_id']);
    expect($result['migrations'][1]->indexes())->toBeArray();
    expect($result['migrations'][1]->indexes())->toEqual(['user_id']);
});
