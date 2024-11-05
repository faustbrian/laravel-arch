<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ResourceCollection;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ResourceCollectionTokenizer extends AbstractTokenizer
{
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
