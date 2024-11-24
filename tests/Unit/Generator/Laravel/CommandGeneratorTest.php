<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\CommandGenerator;

it('should create a command', function (): void {
    shouldCreateFiles([
        'app/Console/Commands/SendEmails.php',
    ]);

    assertMatchesGeneratorSnapshot(CommandGenerator::class, 'command/basic');
});
