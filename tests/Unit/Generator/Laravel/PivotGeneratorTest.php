<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\PivotGenerator;

it('should create a pivot', function (): void {
    shouldCreateFiles([
        'app/Models/TeamMember.php',
    ]);

    assertMatchesGeneratorSnapshot(PivotGenerator::class, 'pivot/basic');
});
