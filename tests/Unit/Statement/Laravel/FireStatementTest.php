<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\FireStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs named event without parameters', function (): void {
    $fireStatement = new FireStatement('user.created');

    assertMatchesSnapshot($fireStatement->code());
});

it('outputs named event with parameters', function (): void {
    $fireStatement = new FireStatement('user.created', [
        new Property('user'),
        new Property('message'),
    ]);

    assertMatchesSnapshot($fireStatement->code());
});

it('outputs class-based event without parameters', function (): void {
    $fireStatement = new FireStatement('App\\Events\\UserCreated');

    assertMatchesSnapshot($fireStatement->code());
});

it('outputs class-based event with parameters', function (): void {
    $fireStatement = new FireStatement('App\\Events\\UserCreated', [
        new Property('user'),
        new Property('message'),
    ]);

    assertMatchesSnapshot($fireStatement->code());
});
