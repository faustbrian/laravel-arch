<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Artisan\CastGenerator;

it('should create a cast via the Artisan CLI', function (): void {
    assertMatchesGeneratorSnapshot(CastGenerator::class, 'cast/basic');
});
