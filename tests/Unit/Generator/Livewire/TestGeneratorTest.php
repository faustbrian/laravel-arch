<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Livewire;

use BaseCodeOy\Arch\Generator\Livewire\TestGenerator;

it('should create a livewire component', function (): void {
    shouldCreateFiles([
        'tests/Feature/Http/Livewire/SearchTest.php',
    ]);

    assertMatchesGeneratorSnapshot(TestGenerator::class, 'livewire/test/basic');
});
