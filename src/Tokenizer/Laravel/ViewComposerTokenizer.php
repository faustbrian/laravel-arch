<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\ViewComposer;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

final readonly class ViewComposerTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['viewComposers'])) {
            return [];
        }

        $viewComposers = [];

        foreach ($tokens['viewComposers'] as $key => $value) {
            $viewComposers[] = $this->populateMetadata(
                new ViewComposer(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'viewComposers' => $viewComposers,
        ];
    }
}
