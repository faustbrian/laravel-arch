<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Rule;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

final readonly class RuleTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['rules'])) {
            return [];
        }

        $rules = [];

        foreach ($tokens['rules'] as $key => $value) {
            $rules[] = $this->populateMetadata(
                new Rule(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'rules' => $rules,
        ];
    }
}
