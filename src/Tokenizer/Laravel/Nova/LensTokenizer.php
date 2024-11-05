<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel\Nova;

use BaseCodeOy\Arch\Model\Nova\Lens;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class LensTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty(Arr::get($tokens, 'nova.lenses'))) {
            return [];
        }

        $lenses = [];

        foreach (Arr::get($tokens, 'nova.lenses') as $name) {
            $lenses[] = new Lens(name: $name);
        }

        return [
            'nova' => [
                'lenses' => $lenses,
            ],
        ];
    }
}
