<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\NotificationGenerator;

it('should create a notification', function (): void {
    shouldCreateFiles([
        'app/Notifications/SendShipment.php',
    ]);

    assertMatchesGeneratorSnapshot(NotificationGenerator::class, 'notification/basic');
});

it('should create a notification with constructor properties', function (): void {
    shouldCreateFiles([
        'app/Notifications/SendShipmentWithConstructor.php',
    ]);

    assertMatchesGeneratorSnapshot(NotificationGenerator::class, 'notification/basic/properties');
});

it('should create a queued notification', function (): void {
    shouldCreateFiles([
        'app/Notifications/SendShipmentQueued.php',
    ]);

    assertMatchesGeneratorSnapshot(NotificationGenerator::class, 'notification/basic/queued');
});

it('should create a notification with markdown', function (): void {
    shouldCreateFiles([
        'app/Notifications/SendShipmentWithMarkdown.php',
    ]);

    assertMatchesGeneratorSnapshot(NotificationGenerator::class, 'notification/markdown');
});

it('should create a queued notification with markdown', function (): void {
    shouldCreateFiles([
        'app/Notifications/SendShipmentWithMarkdownQueued.php',
    ]);

    assertMatchesGeneratorSnapshot(NotificationGenerator::class, 'notification/markdown/queued');
});
