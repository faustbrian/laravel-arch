<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Mixin;

use BaseCodeOy\Arch\Facade\Environment;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

/**
 * @mixin Str
 */
final readonly class StrMixin
{
    public function indent(): \Closure
    {
        return fn (string $content, int $times = 4, string $type = 'space'): string => collect(\explode(\PHP_EOL, $content))
            ->map(fn (string $line): string => \str_repeat($type === 'space' ? ' ' : "\t", $times).$line)
            ->implode(\PHP_EOL);
    }

    public function suffix(): \Closure
    {
        return function (string $string, string $suffix): string {
            if (Str::endsWith($string, $suffix)) {
                return $string;
            }

            return $string.$suffix;
        };
    }

    public function suffixless(): \Closure
    {
        return fn (string $string, string $suffix): string => Str::before($string, $suffix);
    }

    public function className(): \Closure
    {
        return fn (string $class): string => class_basename($class);
    }

    public function classNameCamel(): \Closure
    {
        return fn (string $class): string => Str::camel(Str::className($class));
    }

    public function classNameKebab(): \Closure
    {
        return fn (string $class): string => Str::kebab(Str::className($class));
    }

    public function classNameSnake(): \Closure
    {
        return fn (string $class): string => Str::snake(Str::className($class));
    }

    public function classNameStudly(): \Closure
    {
        return fn (string $class): string => Str::studly(Str::className($class));
    }

    public function toVariable(): \Closure
    {
        return fn (string $key, string $value): string => \sprintf('$%s = %s;', $key, $value);
    }

    public function toArrayItem(): \Closure
    {
        return fn (string $key, string $value): string => \sprintf("'%s' => %s,", $key, $value);
    }

    public function generatorNamespace(): \Closure
    {
        return fn (string $class, ?string $type = null): string => Environment::generators()->findByAccessor($type)->namespace().'\\'.$class;
    }

    public function castNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'casts');
    }

    public function commandNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'commands');
    }

    public function controllerNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'controllers');
    }

    public function controllerTestNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'controllerTests');
    }

    public function eventNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'events');
    }

    public function factoryNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'factories');
    }

    public function formRequestNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'formRequests');
    }

    public function globalScopeNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'globalScopes');
    }

    public function jobNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'jobs');
    }

    public function livewireComponentNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'livewire.components');
    }

    public function livewireTestNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'livewire.tests');
    }

    public function livewireViewNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'livewire.views');
    }

    public function mailNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'mails');
    }

    public function middlewareNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'middleware');
    }

    public function migrationNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'migrations');
    }

    public function modelNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'models');
    }

    public function modelTestNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'modelTests');
    }

    public function notificationNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'notifications');
    }

    public function novaActionNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'nova.actions');
    }

    public function novaDashboardNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'nova.dashboards');
    }

    public function novaFilterNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'nova.filters');
    }

    public function novaLensNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'nova.lenses');
    }

    public function novaMetricNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'nova.metrics');
    }

    public function novaResourceNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'nova.resources');
    }

    public function observerNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'observers');
    }

    public function pivotNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'pivots');
    }

    public function policyNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'policies');
    }

    public function resourceNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'resources');
    }

    public function resourceCollectionNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'resourceCollections');
    }

    public function routeNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'routes');
    }

    public function ruleNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'rules');
    }

    public function seederNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'seeders');
    }

    public function serviceProviderNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'serviceProviders');
    }

    public function viewNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'views');
    }

    public function viewComponentNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'viewComponents');
    }

    public function viewComposerNamespace(): \Closure
    {
        return fn (string $class): string => Str::generatorNamespace($class, 'viewComposers');
    }

    public function relativeNamespace(): \Closure
    {
        return function (string $fullyQualifiedClassName): string {
            $namespace = Config::get('arch.app_namespace').'\\';
            $reference = \ltrim($fullyQualifiedClassName, '\\');

            if (Str::startsWith($reference, $namespace)) {
                return Str::after($reference, $namespace);
            }

            return $reference;
        };
    }

    public function appPath(): \Closure
    {
        return fn (?string $path = null): string => \trim(\sprintf('%s/%s', \str_replace('\\', '/', Config::get('arch.app_path')), $path));
    }

    public function parseStatement(): \Closure
    {
        return function (string $statement): array {
            $result = [];

            foreach (\explode(' ', $statement) as $key => $part) {
                $partComponents = \explode(':', $part);

                if (\count($partComponents) === 2) {
                    if (\array_key_exists($partComponents[0], $result)) {
                        $result[$partComponents[0]][] = $partComponents[1];
                    } else {
                        $result[$partComponents[0]] = [$partComponents[1]];
                    }
                } else {
                    $result[$key] = $partComponents[0];
                }
            }

            return $result;
        };
    }
}
