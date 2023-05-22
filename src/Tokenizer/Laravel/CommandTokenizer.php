<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Command;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

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
