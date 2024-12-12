<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ResourceCollection;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ResourceCollectionTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['resourceCollections'])) {
            return [];
        }

        $resourceCollections = [];

        foreach ($tokens['resourceCollections'] as $key => $value) {
            $resourceCollections[] = $this->populateMetadata(
                new ResourceCollection(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'resourceCollections' => $resourceCollections,
        ];
    }
}
