<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BombenProdukt\Arch\Model\Property;
use BombenProdukt\Arch\Statement\Laravel\NotificationStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate code', function (): void {
    $notificationStatement = new NotificationStatement('InvoicePaid', 'user', [
        new Property('invoice'),
    ]);

    assertMatchesSnapshot($notificationStatement->code());
});

it('can generate test code', function (): void {
    $notificationStatement = new NotificationStatement('InvoicePaid', 'user', [
        new Property('invoice'),
    ]);

    assertMatchesSnapshot($notificationStatement->test());
});
