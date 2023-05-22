<?php

declare(strict_types=1);

namespace Tests\Unit\Generator\Laravel;

use BombenProdukt\Arch\Generator\Laravel\FormRequestGenerator;

it('should create a form request from a name', function (): void {
    shouldCreateFiles([
        'app/Http/Requests/StoreUserRequest.php',
    ]);

    assertMatchesGeneratorSnapshot(FormRequestGenerator::class, 'form-request/basic');
});

it('should create a form request with a model', function (): void {
    shouldCreateFiles([
        'app/Http/Requests/StorePostRequest.php',
    ]);

    assertMatchesGeneratorSnapshot(FormRequestGenerator::class, 'form-request/from-model');
});

it('should create a form request with rules', function (): void {
    shouldCreateFiles([
        'app/Http/Requests/StoreUserRequest.php',
    ]);

    assertMatchesGeneratorSnapshot(FormRequestGenerator::class, 'form-request/with-rules');
});
