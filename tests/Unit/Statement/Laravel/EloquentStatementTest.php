<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\EloquentStatement;

it('outputs save statement', function (): void {
    $eloquentStatement = new EloquentStatement('save', 'post');

    expect($eloquentStatement->code())->toMatchSnapshot();
});

it('outputs create statement', function (): void {
    $eloquentStatement = new EloquentStatement('create', 'post');

    expect($eloquentStatement->code())->toMatchSnapshot();
});

it('outputs update statement with columns', function (): void {
    $eloquentStatement = new EloquentStatement('update', 'post', ['title', 'body']);

    expect($eloquentStatement->code())->toMatchSnapshot();
});

it('outputs update statement without columns', function (): void {
    $eloquentStatement = new EloquentStatement('update', 'post');

    expect($eloquentStatement->code())->toMatchSnapshot();
});

it('outputs find statement', function (): void {
    $eloquentStatement = new EloquentStatement('find', 'post');

    expect($eloquentStatement->code())->toMatchSnapshot();
});

it('outputs delete statement', function (): void {
    $eloquentStatement = new EloquentStatement('delete', 'post');

    expect($eloquentStatement->code())->toMatchSnapshot();
});

it('outputs destroy statement', function (): void {
    $eloquentStatement = new EloquentStatement('destroy', 'post', ['id']);

    expect($eloquentStatement->code())->toMatchSnapshot();
});

it('throws an exception for unknown operation', function (): void {
    $eloquentStatement = new EloquentStatement('unknown', 'post');
    $eloquentStatement->code();
})->throws(\InvalidArgumentException::class, 'Unknown operation: unknown');
