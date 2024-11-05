<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\ViewStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs the statement without parameters', function (): void {
    $viewStatement = new ViewStatement('welcome');

    assertMatchesSnapshot($viewStatement->code());
});

it('outputs the statement with parameters', function (): void {
    $viewStatement = new ViewStatement('welcome', [
        new Property('user'),
        new Property('message'),
    ]);

    assertMatchesSnapshot($viewStatement->code());
});
