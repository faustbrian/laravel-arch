<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BombenProdukt\Arch\Statement\Laravel\ValidateStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate code', function (): void {
    $actual = (
        new ValidateStatement(
            rules: ['key' => 'value'],
        )
    )->code();

    assertMatchesSnapshot($actual);
});
