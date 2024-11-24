<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ModelTestGenerator;

it('should create a model test', function (): void {
    shouldCreateFiles([
        'tests/Unit/Models/UserTest.php',
    ]);

    assertMatchesGeneratorSnapshot(ModelTestGenerator::class, 'model/test/basic');
});
