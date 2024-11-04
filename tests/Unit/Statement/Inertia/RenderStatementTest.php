<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Inertia;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Inertia\RenderStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('outputs the statement without parameters', function (): void {
    $inertiaStatement = new RenderStatement('Dashboard');

    assertMatchesSnapshot($inertiaStatement->code());
});

it('outputs the statement with parameters', function (): void {
    $inertiaStatement = new RenderStatement('Dashboard', [
        new Property('user'),
        new Property('posts'),
    ]);

    assertMatchesSnapshot($inertiaStatement->code());
});
