<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Factory;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

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
