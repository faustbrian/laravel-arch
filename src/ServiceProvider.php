<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch;

use BaseCodeOy\Arch\Command\BuildCommand;
use BaseCodeOy\Arch\Command\PurgeCommand;
use BaseCodeOy\Arch\Command\SetupCommand;
use BaseCodeOy\Arch\Command\TraceCommand;
use BaseCodeOy\Arch\Contract\ClassRendererInterface;
use BaseCodeOy\Arch\Contract\EnvironmentInterface;
use BaseCodeOy\Arch\Contract\ExtensionInterface;
use BaseCodeOy\Arch\Contract\FileRendererInterface;
use BaseCodeOy\Arch\Contract\ParserInterface;
use BaseCodeOy\Arch\Contract\ReporterInterface;
use BaseCodeOy\Arch\Contract\StringRendererInterface;
use BaseCodeOy\Arch\Contract\TreeInterface;
use BaseCodeOy\Arch\Environment\Environment;
use BaseCodeOy\Arch\Mixin\ArrMixin;
use BaseCodeOy\Arch\Mixin\FileMixin;
use BaseCodeOy\Arch\Mixin\StrMixin;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use TypeError;

final class ServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-arch')
            ->hasCommand(BuildCommand::class)
            ->hasCommand(PurgeCommand::class)
            ->hasCommand(SetupCommand::class)
            ->hasCommand(TraceCommand::class)
            ->hasConfigFile('arch');
    }

    public function packageRegistered(): void
    {
        $this->registerMixin();

        $this->registerArch();

        $this->registerPublisher();
    }

    private function registerMixin(): void
    {
        Arr::mixin(new ArrMixin());

        File::mixin(new FileMixin());

        Str::mixin(new StrMixin());
    }

    private function registerArch(): void
    {
        $this->app->singleton(EnvironmentInterface::class, Environment::class);

        $this->app->singleton(ClassRendererInterface::class, Config::get('arch.class_renderer'));

        $this->app->singleton(FileRendererInterface::class, Config::get('arch.file_renderer'));

        $this->app->singleton(StringRendererInterface::class, Config::get('arch.string_renderer'));

        $this->app->singleton(ReporterInterface::class, Config::get('arch.reporter'));

        $this->app->singleton(ParserInterface::class, Config::get('arch.parser'));

        $this->app->singleton(TreeInterface::class, Config::get('arch.tree'));

        foreach (config('arch.extensions') as $extension => $configuration) {
            /** @var ExtensionInterface */
            $extension = $this->app->make($extension);

            if (!\is_array($configuration)) {
                throw new TypeError('Extension configuration must be an array');
            }

            $extension->register($configuration);
        }
    }

    private function registerPublisher(): void
    {
        $this->publishes(
            [\dirname(__DIR__).'/stubs' => Path::arch('stubs')],
            "{$this->package->shortName()}-stubs",
        );
    }
}
