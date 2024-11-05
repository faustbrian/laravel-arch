<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Arch;
use BaseCodeOy\Arch\Contract\GeneratorInterface;
use BaseCodeOy\Arch\Extension\InertiaExtension;
use BaseCodeOy\Arch\Extension\Laravel\NovaExtension;
use BaseCodeOy\Arch\Extension\LaravelExtension;
use BaseCodeOy\Arch\Extension\LivewireExtension;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use function Spatie\Snapshots\assertMatchesSnapshot;

/*
|--------------------------------------------------------------------------
| Test Case
|--------------------------------------------------------------------------
|
| The closure you provide to your test functions is always bound to a specific PHPUnit test
| case class. By default, that class is "PHPUnit\Framework\TestCase". Of course, you may
| need to change it using the "uses()" function to bind a different classes or traits.
|
*/

uses(Tests\TestCase::class)->in('Feature');
uses(Tests\TestCase::class)->in('Unit');

/*
|--------------------------------------------------------------------------
| Expectations
|--------------------------------------------------------------------------
|
| When you're writing tests, you often need to check that values meet certain conditions. The
| "expect()" function gives you access to a set of "expectations" methods that you can use
| to assert different things. Of course, you may extend the Expectation API at any time.
|
*/

expect()->extend('toBeOne', function () {
    return $this->toBe(1);
});

/*
|--------------------------------------------------------------------------
| Functions
|--------------------------------------------------------------------------
|
| While Pest is very powerful out-of-the-box, you may have some testing code specific to your
| project that you don't want to repeat in every file. Here you can also expose helpers as
| global functions to help you to reduce the number of lines of code in your test files.
|
*/

function fixturePath(string $path, string $extension = 'php'): string
{
    return \realpath(__DIR__.'/Fixtures/'.\ltrim($path, '/').'.'.$extension);
}

function fixture(string $path, string $extension = 'php'): string
{
    return \file_get_contents(fixturePath($path, $extension));
}

function stubPath(string $path): string
{
    return \realpath(__DIR__.'/../stubs/'.\ltrim($path, '/').'.stub');
}

function stub(string $path): string
{
    return \file_get_contents(stubPath($path));
}

function draftPath(string $path): string
{
    return fixturePath("Manifest/{$path}", 'yaml');
}

function draft(string $path): string
{
    return \file_get_contents(draftPath($path));
}

function shouldCreateFiles(array $outputs = []): void
{
    File::partialMock();

    foreach ($outputs as $file) {
        File::shouldReceive('exists')
            ->with($file)
            ->andReturn(false);
    }

    File::shouldReceive('put')
        ->andReturn(true);

    File::shouldReceive('exists')
        ->andReturn(true);
}

function assertMatchesGeneratorSnapshot(string $generator, string $draft): void
{
    Arch::parse(draftPath($draft));

    /** @var GeneratorInterface */
    $generator = new $generator();
    $generator->generate();

    assertMatchesSnapshot($generator->result()->toArray());
}

function assertMatchesArchSnapshot(string $draft): void
{
    Arch::parse(draftPath($draft));

    assertMatchesSnapshot(Arch::generate()->toArray());
}

function registerExtensions(): void
{
    (new LaravelExtension())->register(Config::get('arch.extensions.'.LaravelExtension::class));
    (new NovaExtension())->register(Config::get('arch.extensions.'.NovaExtension::class));
    (new InertiaExtension())->register(Config::get('arch.extensions.'.InertiaExtension::class));
    (new LivewireExtension())->register(Config::get('arch.extensions.'.LivewireExtension::class));
}
