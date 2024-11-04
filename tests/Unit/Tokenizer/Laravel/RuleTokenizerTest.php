<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Rule;
use BaseCodeOy\Arch\Tokenizer\Laravel\RuleTokenizer;

it('returns an empty array when no rules are provided', function (): void {
    $tokenizer = new RuleTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated rules when rules are provided', function (): void {
    $tokenizer = new RuleTokenizer();

    $tokens = [
        'rules' => [
            'EmailRule',
            'PasswordRule',
            'UsernameRule',
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['rules'])->toBeArray()->toHaveCount(3);

    expect($result['rules'][0])->toBeInstanceOf(Rule::class);
    expect($result['rules'][0]->name())->toBe('Email');

    expect($result['rules'][1])->toBeInstanceOf(Rule::class);
    expect($result['rules'][1]->name())->toBe('Password');

    expect($result['rules'][2])->toBeInstanceOf(Rule::class);
    expect($result['rules'][2]->name())->toBe('Username');
});
