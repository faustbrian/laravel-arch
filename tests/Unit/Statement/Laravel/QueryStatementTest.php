<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\QueryStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs the statement for all operation', function (): void {
    $queryStatement = new QueryStatement('all');

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});

it('outputs the statement for paginate operation', function (): void {
    $queryStatement = new QueryStatement('paginate');

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});

it('outputs the statement for simplePaginate operation', function (): void {
    $queryStatement = new QueryStatement('simplePaginate');

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});

it('outputs the statement for count operation', function (): void {
    $queryStatement = new QueryStatement('count');

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});

it('outputs the statement for exists operation', function (): void {
    $queryStatement = new QueryStatement('exists');

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});

it('outputs the statement with where clause', function (): void {
    $queryStatement = new QueryStatement('get', ['where' => ['user_id']]);

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});

it('outputs the statement with pluck clause', function (): void {
    $queryStatement = new QueryStatement('pluck', ['pluck' => ['title']]);

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});

it('outputs the statement with order clause', function (): void {
    $queryStatement = new QueryStatement('get', ['order' => ['created_at']]);

    assertMatchesSnapshot($queryStatement->code(['reference' => 'post']));
});
