<?php

declare(strict_types=1);

namespace BombenProdukt\Arch;

use BombenProdukt\Arch\Command\BuildCommand;
use BombenProdukt\Arch\Command\PurgeCommand;
use BombenProdukt\Arch\Command\SetupCommand;
use BombenProdukt\Arch\Command\TraceCommand;
use BombenProdukt\Arch\Contract\ClassRendererInterface;
use BombenProdukt\Arch\Contract\EnvironmentInterface;
use BombenProdukt\Arch\Contract\ExtensionInterface;
use BombenProdukt\Arch\Contract\FileRendererInterface;
use BombenProdukt\Arch\Contract\ParserInterface;
use BombenProdukt\Arch\Contract\ReporterInterface;
use BombenProdukt\Arch\Contract\StringRendererInterface;
use BombenProdukt\Arch\Contract\TreeInterface;
use BombenProdukt\Arch\Environment\Environment;
use BombenProdukt\Arch\Mixin\ArrMixin;
use BombenProdukt\Arch\Mixin\FileMixin;
use BombenProdukt\Arch\Mixin\StrMixin;
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
