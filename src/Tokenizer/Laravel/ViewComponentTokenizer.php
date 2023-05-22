<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\ViewComponent;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

final readonly class ViewComponentTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['viewComponents'])) {
            return [];
        }

        $viewComponents = [];

        foreach ($tokens['viewComponents'] as $key => $value) {
            $viewComponents[] = $this->populateMetadata(
                new ViewComponent(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'viewComponents' => $viewComponents,
        ];
    }
}
