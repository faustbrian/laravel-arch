<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ControllerTestGenerator;

it('should create a controller test', function (): void {
    shouldCreateFiles([
        'tests/Feature/Http/Controllers/UserControllerTest.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerTestGenerator::class, 'controller/test/basic');
});
