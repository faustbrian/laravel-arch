<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace Tests\Unit\Mixin;

use Illuminate\Support\Str;

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

    expect($formatted)->toMatchSnapshot();
});

it('formats key-value pair to array item', function (): void {
    $formatted = Str::toArrayItem('example_key', 'example_value');

    expect($formatted)->toMatchSnapshot();
});

it('formats fully qualified class names for generator types', function (): void {
    $class = 'Example';

    expect(Str::castNamespace($class))->toMatchSnapshot();
    expect(Str::commandNamespace($class))->toMatchSnapshot();
    expect(Str::controllerNamespace($class))->toMatchSnapshot();
    expect(Str::controllerTestNamespace($class))->toMatchSnapshot();
    expect(Str::eventNamespace($class))->toMatchSnapshot();
    expect(Str::factoryNamespace($class))->toMatchSnapshot();
    expect(Str::formRequestNamespace($class))->toMatchSnapshot();
    expect(Str::globalScopeNamespace($class))->toMatchSnapshot();
    expect(Str::jobNamespace($class))->toMatchSnapshot();
    expect(Str::livewireComponentNamespace($class))->toMatchSnapshot();
    expect(Str::livewireTestNamespace($class))->toMatchSnapshot();
    expect(Str::livewireViewNamespace($class))->toMatchSnapshot();
    expect(Str::mailNamespace($class))->toMatchSnapshot();
    expect(Str::middlewareNamespace($class))->toMatchSnapshot();
    expect(Str::migrationNamespace($class))->toMatchSnapshot();
    expect(Str::modelNamespace($class))->toMatchSnapshot();
    expect(Str::modelTestNamespace($class))->toMatchSnapshot();
    expect(Str::notificationNamespace($class))->toMatchSnapshot();
    expect(Str::observerNamespace($class))->toMatchSnapshot();
    expect(Str::pivotNamespace($class))->toMatchSnapshot();
    expect(Str::policyNamespace($class))->toMatchSnapshot();
    expect(Str::resourceNamespace($class))->toMatchSnapshot();
    expect(Str::resourceCollectionNamespace($class))->toMatchSnapshot();
    expect(Str::routeNamespace($class))->toMatchSnapshot();
    expect(Str::ruleNamespace($class))->toMatchSnapshot();
    expect(Str::seederNamespace($class))->toMatchSnapshot();
    expect(Str::serviceProviderNamespace($class))->toMatchSnapshot();
    expect(Str::viewNamespace($class))->toMatchSnapshot();
    expect(Str::viewComponentNamespace($class))->toMatchSnapshot();
    expect(Str::viewComposerNamespace($class))->toMatchSnapshot();
});
