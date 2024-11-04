<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Statement\Laravel\SessionStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs the statement with put operation', function (): void {
    $sessionStatement = new SessionStatement('put', 'user.name');

    assertMatchesSnapshot($sessionStatement->code());
});

it('outputs the statement with get operation', function (): void {
    $sessionStatement = new SessionStatement('get', 'user.name');

    assertMatchesSnapshot($sessionStatement->code());
});

it('outputs the statement with forget operation', function (): void {
    $sessionStatement = new SessionStatement('forget', 'user.name');

    assertMatchesSnapshot($sessionStatement->code());
});
