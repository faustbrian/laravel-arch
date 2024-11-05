<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\MailGenerator;

it('should create a mail', function (): void {
    shouldCreateFiles([
        'app/Mail/OrderShipped.php',
    ]);

    assertMatchesGeneratorSnapshot(MailGenerator::class, 'mail/basic');
});

it('should create a mail with constructor properties', function (): void {
    shouldCreateFiles([
        'app/Mail/OrderShippedWithConstructor.php',
    ]);

    assertMatchesGeneratorSnapshot(MailGenerator::class, 'mail/basic/properties');
});

it('should create a mail with markdown', function (): void {
    shouldCreateFiles([
        'app/Mail/OrderShippedWithMarkdown.php',
    ]);

    assertMatchesGeneratorSnapshot(MailGenerator::class, 'mail/markdown');
});

it('should create a queued mail', function (): void {
    shouldCreateFiles([
        'app/Mail/OrderShippedQueued.php',
    ]);

    assertMatchesGeneratorSnapshot(MailGenerator::class, 'mail/basic/queued');
});

it('should create a queued mail with markdown', function (): void {
    shouldCreateFiles([
        'app/Mail/OrderShippedWithMarkdownQueued.php',
    ]);

    assertMatchesGeneratorSnapshot(MailGenerator::class, 'mail/markdown/queued');
});
