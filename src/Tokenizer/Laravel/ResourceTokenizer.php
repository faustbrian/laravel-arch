<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Resource;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

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
