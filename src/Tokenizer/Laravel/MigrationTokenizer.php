<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\Migration;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class MigrationTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['migrations'])) {
            return [];
        }

        $migrations = [];

        foreach ($tokens['migrations'] as $key => $value) {
            if (\is_numeric($key)) {
                $migration = new Migration(
                    name: $value,
                    columns: [],
                    indexes: [],
                );
            } else {
                $migration = new Migration(
                    name: $key,
                    columns: Arr::get($value, 'columns', []),
                    indexes: Arr::get($value, 'indexes', []),
                );
            }

            $migrations[] = $this->populateMetadata($migration, $value);
        }

        return [
            'migrations' => $migrations,
        ];
    }
}
