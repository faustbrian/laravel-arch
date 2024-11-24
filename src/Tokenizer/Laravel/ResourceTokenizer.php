<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Resource;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ResourceTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['resources'])) {
            return [];
        }

        $resources = [];

        foreach ($tokens['resources'] as $key => $value) {
            $resources[] = $this->populateMetadata(
                new Resource(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'resources' => $resources,
        ];
    }
}
