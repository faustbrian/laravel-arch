<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Command;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class CommandTokenizer extends AbstractTokenizer
{
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
