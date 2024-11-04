<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ModelTestGenerator;

it('should create a model test', function (): void {
    shouldCreateFiles([
        'tests/Unit/Models/UserTest.php',
    ]);

    assertMatchesGeneratorSnapshot(ModelTestGenerator::class, 'model/test/basic');
});
