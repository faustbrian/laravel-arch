<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Model\GlobalScope;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class GlobalScopeTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['globalScopes'])) {
            return [];
        }

        $globalScopes = [];

        foreach ($tokens['globalScopes'] as $key => $value) {
            $globalScopes[] = $this->populateMetadata(
                new GlobalScope(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'globalScopes' => $globalScopes,
        ];
    }
}
