<?php

declare(strict_types=1);

namespace Tests\Unit\Mixin;

use Illuminate\Support\Str;
use function Spatie\Snapshots\assertMatchesSnapshot;

beforeEach(fn () => registerExtensions());

it('returns the base class name', function (): void {
    $class = 'App\\Http\\Controllers\\MyController';

    expect(Str::className($class))->toBe('MyController');
});

it('converts class name to camel case', function (): void {
    $class = 'App\\Http\\Controllers\\MyController';

    expect(Str::classNameCamel($class))->toBe('myController');
});

it('converts class name to kebab case', function (): void {
    $class = 'App\\Http\\Controllers\\MyController';

    expect(Str::classNameKebab($class))->toBe('my-controller');
});

it('converts class name to snake case', function (): void {
    $class = 'App\\Http\\Controllers\\MyController';

    expect(Str::classNameSnake($class))->toBe('my_controller');
});

it('converts class name to studly case', function (): void {
    $class = 'App\\Http\\Controllers\\MyController';

    expect(Str::classNameStudly($class))->toBe('MyController');
});

it('formats key-value pair to variable assignment', function (): void {
    $formatted = Str::toVariable('example_key', 'example_value');

    assertMatchesSnapshot($formatted);
});

it('formats key-value pair to array item', function (): void {
    $formatted = Str::toArrayItem('example_key', 'example_value');

    assertMatchesSnapshot($formatted);
});

it('formats fully qualified class names for generator types', function (): void {
    $class = 'Example';

    assertMatchesSnapshot(Str::castNamespace($class));
    assertMatchesSnapshot(Str::commandNamespace($class));
    assertMatchesSnapshot(Str::controllerNamespace($class));
    assertMatchesSnapshot(Str::controllerTestNamespace($class));
    assertMatchesSnapshot(Str::eventNamespace($class));
    assertMatchesSnapshot(Str::factoryNamespace($class));
    assertMatchesSnapshot(Str::formRequestNamespace($class));
    assertMatchesSnapshot(Str::globalScopeNamespace($class));
    assertMatchesSnapshot(Str::jobNamespace($class));
    assertMatchesSnapshot(Str::livewireComponentNamespace($class));
    assertMatchesSnapshot(Str::livewireTestNamespace($class));
    assertMatchesSnapshot(Str::livewireViewNamespace($class));
    assertMatchesSnapshot(Str::mailNamespace($class));
    assertMatchesSnapshot(Str::middlewareNamespace($class));
    assertMatchesSnapshot(Str::migrationNamespace($class));
    assertMatchesSnapshot(Str::modelNamespace($class));
    assertMatchesSnapshot(Str::modelTestNamespace($class));
    assertMatchesSnapshot(Str::notificationNamespace($class));
    assertMatchesSnapshot(Str::observerNamespace($class));
    assertMatchesSnapshot(Str::pivotNamespace($class));
    assertMatchesSnapshot(Str::policyNamespace($class));
    assertMatchesSnapshot(Str::resourceNamespace($class));
    assertMatchesSnapshot(Str::resourceCollectionNamespace($class));
    assertMatchesSnapshot(Str::routeNamespace($class));
    assertMatchesSnapshot(Str::ruleNamespace($class));
    assertMatchesSnapshot(Str::seederNamespace($class));
    assertMatchesSnapshot(Str::serviceProviderNamespace($class));
    assertMatchesSnapshot(Str::viewNamespace($class));
    assertMatchesSnapshot(Str::viewComponentNamespace($class));
    assertMatchesSnapshot(Str::viewComposerNamespace($class));
});
