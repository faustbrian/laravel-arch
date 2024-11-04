<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Castable;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class CastableTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['castables'])) {
            return [];
        }

        $castables = [];

        foreach ($tokens['castables'] as $key => $value) {
            $castables[] = $this->populateMetadata(
                new Castable(
                    name: \is_numeric($key) ? $value : $key,
                    castsAttributes: Arr::get($value, 'castsAttributes', false),
                ),
                $value,
            );
        }

        return [
            'castables' => $castables,
        ];
    }
}
