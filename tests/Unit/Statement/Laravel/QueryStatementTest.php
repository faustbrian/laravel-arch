<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\QueryStatement;

it('outputs the statement for all operation', function (): void {
    $queryStatement = new QueryStatement('all');

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});

it('outputs the statement for paginate operation', function (): void {
    $queryStatement = new QueryStatement('paginate');

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});

it('outputs the statement for simplePaginate operation', function (): void {
    $queryStatement = new QueryStatement('simplePaginate');

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});

it('outputs the statement for count operation', function (): void {
    $queryStatement = new QueryStatement('count');

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});

it('outputs the statement for exists operation', function (): void {
    $queryStatement = new QueryStatement('exists');

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});

it('outputs the statement with where clause', function (): void {
    $queryStatement = new QueryStatement('get', ['where' => ['user_id']]);

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});

it('outputs the statement with pluck clause', function (): void {
    $queryStatement = new QueryStatement('pluck', ['pluck' => ['title']]);

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});

it('outputs the statement with order clause', function (): void {
    $queryStatement = new QueryStatement('get', ['order' => ['created_at']]);

    expect($queryStatement->code(['reference' => 'post']))->toMatchSnapshot();
});
