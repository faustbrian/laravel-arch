<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Generator\Laravel;

use BaseCodeOy\Arch\Generator\Laravel\ControllerGenerator;

it('should create a controller of resource=web type=plain', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/PlainController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/plain');
});

it('should create a controller of resource=api type=plain', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/PlainApiController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/api/plain');
});

it('should create a controller of resource=web type=invokable', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/InvokableController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/invokable');
});

it('should create a controller of resource=api type=invokable', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/InvokableApiController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/api/invokable');
});

it('should create a controller of resource=web type=resource', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/ResourceController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/resource');
});

it('should create a controller of resource=api type=resource', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/ResourceApiController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/api/resource');
});

it('should create a controller of resource=web type=nested', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/ParentNestedController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/nested');
});

it('should create a controller of resource=web type=nested.singleton', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/ParentNestedSingletonController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/nested/singleton');
});

it('should create a controller of resource=api type=nested.singleton', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/ParentNestedSingletonApiController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/api/nested/singleton');
});

it('should create a controller of resource=web type=singleton', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/SingletonController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/singleton');
});

it('should create a controller of resource=api type=singleton', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/SingletonApiController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/api/singleton');
});

it('should create a controller of resource=web type=resource with statements', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/StatementController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/resource-with-statements');
});

it('should create a controller with authorizeResource in the constructor', function (): void {
    shouldCreateFiles([
        'app/Http/Controllers/AuthorizedController.php',
    ]);

    assertMatchesGeneratorSnapshot(ControllerGenerator::class, 'controller/web/authorize-resource');
});
