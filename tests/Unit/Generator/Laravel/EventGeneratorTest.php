<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\EventGenerator;

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
