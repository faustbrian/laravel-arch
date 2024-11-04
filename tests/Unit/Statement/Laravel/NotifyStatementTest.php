<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\NotifyStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate code', function (): void {
    $statement = new NotifyStatement('user', 'InvoicePaid', [
        new Property('invoice'),
    ]);

    assertMatchesSnapshot($statement->code());
});
