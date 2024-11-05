<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\JobGenerator;

it('should create a job', function (): void {
    shouldCreateFiles([
        'app/Jobs/WithoutParameters.php',
    ]);

    assertMatchesGeneratorSnapshot(JobGenerator::class, 'job/basic');
});

it('should create a job with parameters', function (): void {
    shouldCreateFiles([
        'app/Jobs/WithParameters.php',
    ]);

    assertMatchesGeneratorSnapshot(JobGenerator::class, 'job/properties');
});

it('should create a queued job', function (): void {
    shouldCreateFiles([
        'app/Jobs/QueuedWithoutParameters.php',
    ]);

    assertMatchesGeneratorSnapshot(JobGenerator::class, 'job/queued/basic');
});

it('should create a queued job with parameters', function (): void {
    shouldCreateFiles([
        'app/Jobs/QueuedWithParameters.php',
    ]);

    assertMatchesGeneratorSnapshot(JobGenerator::class, 'job/queued/properties');
});
