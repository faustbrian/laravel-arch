<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Factory;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

final readonly class FactoryTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['factories'])) {
            return [];
        }

        $factories = [];

        foreach ($tokens['factories'] as $key => $value) {
            $factories[] = $this->populateMetadata(
                new Factory(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'factories' => $factories,
        ];
    }
}
