<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\View;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

final readonly class ViewTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['views'])) {
            return [];
        }

        $views = [];

        foreach ($tokens['views'] as $key => $value) {
            $views[] = $this->populateMetadata(
                new View(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'views' => $views,
        ];
    }
}
