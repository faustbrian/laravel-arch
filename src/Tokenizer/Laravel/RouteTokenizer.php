<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Route;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class RouteTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['routes'])) {
            return [];
        }

        $routes = [];

        foreach ($tokens['routes'] as $group => $groupRoutes) {
            foreach ($groupRoutes as $route) {
                $routes[] = new Route(
                    type: $group,
                    verb: $route['verb'],
                    uri: $route['uri'],
                    action: $route['action'],
                    methods: $route['methods'],
                );
            }
        }

        return [
            'routes' => $routes,
        ];
    }
}
