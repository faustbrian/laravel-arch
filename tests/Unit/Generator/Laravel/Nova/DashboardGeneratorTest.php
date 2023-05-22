<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel\Nova;

use BombenProdukt\Arch\Generator\Laravel\Nova\DashboardGenerator;

it('should create a nova dashboard', function (): void {
    shouldCreateFiles([
        'app/Nova/Dashboards/UserInsights.php',
    ]);

    assertMatchesGeneratorSnapshot(DashboardGenerator::class, 'nova/dashboard');
});
