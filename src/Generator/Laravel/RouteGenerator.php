<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Route;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

final class RouteGenerator extends AbstractGenerator
{
    /**
     * @var string[]
     */
    private array $resourceMethods = ['index', 'create', 'store', 'edit', 'update', 'show', 'destroy'];

    /**
     * @var string[]
     */
    private array $apiResourceMethods = ['index', 'store', 'update', 'show', 'destroy'];

    public function generate(): void
    {
        $routes = collect(Tree::get('routes'))->groupBy(fn (Route $route): string => $route->type());

        foreach ($routes as $type => $routes) {
            $result = [];

            foreach ($routes as $route) {
                $result[] = $this->buildRoute($route);
            }

            File::append("routes/{$type}.php", \implode(\PHP_EOL, $result));
        }
    }

    private function buildRoute(Route $route): string
    {
        $routes = '';
        $className = Str::controllerNamespace($route->action());

        foreach (\array_diff($route->methods(), $this->resourceMethods) as $method) {
            $routes .= $this->buildRouteLine($className, $route->uri(), $method);
        }

        $resourceMethods = \array_intersect($route->methods(), $this->resourceMethods);

        if (\count($resourceMethods)) {
            $routes .= \sprintf(
                $route->isApiResource() ? "Route::apiResource('%s', %s::class)" : "Route::resource('%s', %s::class)",
                $route->uri(),
                $className,
            );

            $missingMethods = \array_diff(
                $route->isApiResource() ? $this->apiResourceMethods : $this->resourceMethods,
                $resourceMethods,
            );

            if (\count($missingMethods) > 0) {
                $routes .= \count($missingMethods) < 4
                    ? \sprintf("->except('%s')", \implode("', '", $missingMethods))
                    : \sprintf("->only('%s')", \implode("', '", $resourceMethods));
            }

            $routes .= ';'.\PHP_EOL;
        }

        return \trim($routes);
    }

    private function buildRouteLine(string $className, string $slug, string $method): string
    {
        if ($method === '__invoke') {
            return \sprintf("Route::get('%s', %s);", $slug, $className);
        }

        return \sprintf("Route::get('%s/%s', [%s, '%s']);", $slug, Str::kebab($method), $className, $method);
    }
}
