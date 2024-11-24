<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Controller;
use BaseCodeOy\Arch\Model\ControllerMethod;
use BaseCodeOy\Arch\Model\FormRequest;
use BaseCodeOy\Arch\Model\Policy;
use BaseCodeOy\Arch\Model\View;
use BaseCodeOy\Arch\Tokenizer\Laravel\ControllerTokenizer;

it('returns an empty array when no controllers are provided', function (): void {
    $tokenizer = new ControllerTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated controllers when controllers are provided', function (): void {
    $tokenizer = new ControllerTokenizer();

    $tokens = [
        'controllers' => [
            'web' => [
                'User' => [
                    'resource' => true,
                    'methods' => [
                        'index' => [],
                        'create' => [],
                        'store' => [],
                        'show' => [],
                        'edit' => [],
                        'update' => [],
                        'destroy' => [],
                    ],
                    'requests' => true,
                    'policy' => true,
                ],
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['controllers'])->toBeArray()->toHaveCount(1);
    expect($result['controllers'][0])->toBeInstanceOf(Controller::class);
    expect($result['controllers'][0]->name())->toBe('User');
    expect($result['controllers'][0]->group())->toBe('web');
    expect($result['controllers'][0]->methods())->toBeArray()->toHaveCount(7);
    expect($result['controllers'][0]->methods()[0])->toBeInstanceOf(ControllerMethod::class);

    expect($result['formRequests'])->toBeArray()->toHaveCount(2);
    expect($result['formRequests'][0])->toBeInstanceOf(FormRequest::class);
    expect($result['formRequests'][0]->name())->toBe('StoreUser');
    expect($result['formRequests'][1])->toBeInstanceOf(FormRequest::class);
    expect($result['formRequests'][1]->name())->toBe('UpdateUser');

    expect($result['policies'])->toBeArray()->toHaveCount(1);
    expect($result['policies'][0])->toBeInstanceOf(Policy::class);
    expect($result['policies'][0]->name())->toBe('User');

    expect($result['views'])->toBeArray()->toHaveCount(7);
    expect($result['views'][0])->toBeInstanceOf(View::class);
    expect($result['views'][0]->name())->toBe('users.index');
});
