<?php

declare(strict_types=1);

namespace Tests\Unit\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Route;
use BaseCodeOy\Arch\Tokenizer\Laravel\RouteTokenizer;

it('returns an empty array when no routes are provided', function (): void {
    $tokenizer = new RouteTokenizer();

    $tokens = [];
    $result = $tokenizer->tokenize($tokens);

    expect($result)->toBeArray();
    expect($result)->toBeEmpty();
});

it('returns populated routes when routes are provided', function (): void {
    $tokenizer = new RouteTokenizer();

    $tokens = [
        'routes' => [
            'web' => [
                [
                    'verb' => 'GET',
                    'uri' => '/',
                    'action' => 'HomeController@index',
                    'methods' => ['GET', 'HEAD'],
                ],
            ],
            'api' => [
                [
                    'verb' => 'GET',
                    'uri' => '/user',
                    'action' => 'UserController@index',
                    'methods' => ['GET', 'HEAD'],
                ],
            ],
        ],
    ];

    $result = $tokenizer->tokenize($tokens);

    expect($result['routes'])->toBeArray()->toHaveCount(2);

    expect($result['routes'][0])->toBeInstanceOf(Route::class);
    expect($result['routes'][0]->type())->toBe('web');
    expect($result['routes'][0]->verb())->toBe('GET');
    expect($result['routes'][0]->uri())->toBe('/');
    expect($result['routes'][0]->action())->toBe('HomeController@index');
    expect($result['routes'][0]->methods())->toBeArray()->toContain('GET', 'HEAD');

    expect($result['routes'][1])->toBeInstanceOf(Route::class);
    expect($result['routes'][1]->type())->toBe('api');
    expect($result['routes'][1]->verb())->toBe('GET');
    expect($result['routes'][1]->uri())->toBe('/user');
    expect($result['routes'][1]->action())->toBe('UserController@index');
    expect($result['routes'][1]->methods())->toBeArray()->toContain('GET', 'HEAD');
});
