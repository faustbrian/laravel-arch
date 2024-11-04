<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ControllerTestGenerator;

it('should create a controller test', function (): void {
    shouldCreateFiles([
        'tests/Feature/Http/Controllers/UserControllerTest.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerTestGenerator::class, 'controller/test/basic');
});
