<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Livewire;

use BaseCodeOy\Arch\Generator\Livewire\ViewGenerator;

it('should create a livewire view', function (): void {
    shouldCreateFiles([
        'resources/views/livewire/search.blade.php',
    ]);

    assertMatchesGeneratorSnapshot(ViewGenerator::class, 'livewire/view/basic');
});
