<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel\Nova;

use BombenProdukt\Arch\Model\Nova\Resource;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class ResourceTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty(Arr::get($tokens, 'nova.resources'))) {
            return [];
        }

        $resources = [];

        foreach (Arr::get($tokens, 'nova.resources') as $name) {
            $resources[] = new Resource(name: $name);
        }

        return [
            'nova' => [
                'resources' => $resources,
            ],
        ];
    }
}
