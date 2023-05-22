<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Pivot;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

final readonly class PivotTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['pivots'])) {
            return [];
        }

        $pivots = [];

        foreach ($tokens['pivots'] as $key => $value) {
            $pivots[] = $this->populateMetadata(
                new Pivot(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'pivots' => $pivots,
        ];
    }
}
