<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\EventGenerator;

it('should create an event', function (): void {
    shouldCreateFiles([
        'app/Events/OrderShipped.php',
    ]);

    assertMatchesGeneratorSnapshot(EventGenerator::class, 'event/event');
});

it('should create an event that broadcasts', function (): void {
    shouldCreateFiles([
        'app/Events/InvoicePaid.php',
    ]);

    assertMatchesGeneratorSnapshot(EventGenerator::class, 'event/broadcast');
});

it('should create an event that has a constructor', function (): void {
    shouldCreateFiles([
        'app/Events/InvoicePaid.php',
    ]);

    assertMatchesGeneratorSnapshot(EventGenerator::class, 'event/constructor');
});
