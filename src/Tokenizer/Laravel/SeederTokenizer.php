<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Seeder;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class SeederTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['seeders'])) {
            return [];
        }

        $seeders = [];

        foreach ($tokens['seeders'] as $key => $value) {
            $seeders[] = $this->populateMetadata(
                new Seeder(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'seeders' => $seeders,
        ];
    }
}
