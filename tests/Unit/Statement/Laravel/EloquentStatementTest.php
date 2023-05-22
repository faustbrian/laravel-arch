<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BombenProdukt\Arch\Statement\Laravel\EloquentStatement;
use InvalidArgumentException;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs save statement', function (): void {
    $eloquentStatement = new EloquentStatement('save', 'post');

    assertMatchesSnapshot($eloquentStatement->code());
});

it('outputs create statement', function (): void {
    $eloquentStatement = new EloquentStatement('create', 'post');

    assertMatchesSnapshot($eloquentStatement->code());
});

it('outputs update statement with columns', function (): void {
    $eloquentStatement = new EloquentStatement('update', 'post', ['title', 'body']);

    assertMatchesSnapshot($eloquentStatement->code());
});

it('outputs update statement without columns', function (): void {
    $eloquentStatement = new EloquentStatement('update', 'post');

    assertMatchesSnapshot($eloquentStatement->code());
});

it('outputs find statement', function (): void {
    $eloquentStatement = new EloquentStatement('find', 'post');

    assertMatchesSnapshot($eloquentStatement->code());
});

it('outputs delete statement', function (): void {
    $eloquentStatement = new EloquentStatement('delete', 'post');

    assertMatchesSnapshot($eloquentStatement->code());
});

it('outputs destroy statement', function (): void {
    $eloquentStatement = new EloquentStatement('destroy', 'post', ['id']);

    assertMatchesSnapshot($eloquentStatement->code());
});

it('throws an exception for unknown operation', function (): void {
    $eloquentStatement = new EloquentStatement('unknown', 'post');
    $eloquentStatement->code();
})->throws(InvalidArgumentException::class, 'Unknown operation: unknown');
