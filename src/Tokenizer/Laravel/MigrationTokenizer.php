<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Migration;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use Illuminate\Support\Arr;

final readonly class MigrationTokenizer extends AbstractTokenizer
{
    #[\Override()]
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
