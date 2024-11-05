<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\CommandGenerator;

it('should create a command', function (): void {
    shouldCreateFiles([
        'app/Console/Commands/SendEmails.php',
    ]);

    assertMatchesGeneratorSnapshot(CommandGenerator::class, 'command/basic');
});
