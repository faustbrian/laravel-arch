<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Pivot;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class PivotTokenizer extends AbstractTokenizer
{
    #[\Override()]
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
