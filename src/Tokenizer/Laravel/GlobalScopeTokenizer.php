<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Model\GlobalScope;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class GlobalScopeTokenizer extends AbstractTokenizer
{
    #[\Override()]
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
