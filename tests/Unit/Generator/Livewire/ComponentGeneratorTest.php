<?php

declare(strict_types=1);

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
