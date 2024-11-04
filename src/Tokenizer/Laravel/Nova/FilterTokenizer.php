<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Model\Nova\Filter;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class FilterTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty(Arr::get($tokens, 'nova.filters'))) {
            return [];
        }

        $filters = [];

        foreach (Arr::get($tokens, 'nova.filters') as $key => $value) {
            if (\is_numeric($key)) {
                $filters[] = new Filter(
                    name: $value,
                    type: 'filter',
                );
            } else {
                $filters[] = new Filter(
                    name: $key,
                    type: $value,
                );
            }
        }

        return [
            'nova' => [
                'filters' => $filters,
            ],
        ];
    }
}
