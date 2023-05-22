<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\GlobalScopeGenerator;

it('should create a global scope', function (): void {
    shouldCreateFiles([
        'app/Models/Scopes/AncientScope.php',
    ]);

    assertMatchesGeneratorSnapshot(GlobalScopeGenerator::class, 'scope/basic');
});
