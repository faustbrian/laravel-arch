<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Livewire;

use BaseCodeOy\Arch\Generator\Livewire\ComponentGenerator;

it('should create a livewire component', function (): void {
    shouldCreateFiles([
        'app/Http/Livewire/Search.php',
    ]);

    assertMatchesGeneratorSnapshot(ComponentGenerator::class, 'livewire/component/basic');
});

it('should create a livewire component with an inline view', function (): void {
    shouldCreateFiles([
        'app/Http/Livewire/Modal.php',
    ]);

    assertMatchesGeneratorSnapshot(ComponentGenerator::class, 'livewire/component/inline');
});
