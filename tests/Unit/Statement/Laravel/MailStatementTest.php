<?php

declare(strict_types=1);

namespace Tests\Unit\Statement\Laravel;

use BaseCodeOy\Arch\Model\Property;
use BaseCodeOy\Arch\Statement\Laravel\MailStatement;
use function Spatie\Snapshots\assertMatchesSnapshot;

it('can generate code', function (): void {
    $mailStatement = new MailStatement('InvoiceMailable', 'user', [
        new Property('invoice'),
    ]);

    assertMatchesSnapshot($mailStatement->code());
});

it('can generate test code', function (): void {
    $mailStatement = new MailStatement('InvoiceMailable', 'user', [
        new Property('invoice'),
    ]);

    assertMatchesSnapshot($mailStatement->test());
});
