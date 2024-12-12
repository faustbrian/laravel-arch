<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Command;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class CommandTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['commands'])) {
            return [];
        }

        $commands = [];

        foreach ($tokens['commands'] as $key => $value) {
            $commands[] = $this->populateMetadata(
                new Command(
                    name: \is_numeric($key) ? $value : $key,
                    signature: $value['signature'],
                    description: $value['description'],
                ),
                $value,
            );
        }

        return [
            'commands' => $commands,
        ];
    }
}
