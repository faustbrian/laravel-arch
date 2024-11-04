<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Model\Nova\Resource;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
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
