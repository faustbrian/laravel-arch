<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Route;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class RouteTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['routes'])) {
            return [];
        }

        $routes = [];

        foreach ($tokens['routes'] as $group => $groupRoutes) {
            foreach ($groupRoutes as $groupRoute) {
                $routes[] = new Route(
                    type: $group,
                    verb: $groupRoute['verb'],
                    uri: $groupRoute['uri'],
                    action: $groupRoute['action'],
                    methods: $groupRoute['methods'],
                );
            }
        }

        return [
            'routes' => $routes,
        ];
    }
}
