<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Policy;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class PolicyTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['policies'])) {
            return [];
        }

        $policies = [];

        foreach ($tokens['policies'] as $key => $value) {
            $policies[] = $this->populateMetadata(
                new Policy(
                    name: \is_numeric($key) ? $value : $key,
                    plain: Arr::get($value, 'plain', false),
                ),
                $value,
            );
        }

        return [
            'policies' => $policies,
        ];
    }
}
