<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Livewire;

use BaseCodeOy\Arch\Generator\Livewire\TestGenerator;

it('should create a livewire component', function (): void {
    shouldCreateFiles([
        'tests/Feature/Http/Livewire/SearchTest.php',
    ]);

    assertMatchesGeneratorSnapshot(TestGenerator::class, 'livewire/test/basic');
});
