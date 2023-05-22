<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Livewire;

use BombenProdukt\Arch\Generator\Livewire\ViewGenerator;

it('should create a livewire view', function (): void {
    shouldCreateFiles([
        'resources/views/livewire/search.blade.php',
    ]);

    assertMatchesGeneratorSnapshot(ViewGenerator::class, 'livewire/view/basic');
});
