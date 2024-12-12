<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Middleware;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class MiddlewareTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['middleware'])) {
            return [];
        }

        $middleware = [];

        foreach ($tokens['middleware'] as $key => $value) {
            $middleware[] = $this->populateMetadata(
                new Middleware(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'middleware' => $middleware,
        ];
    }
}
