<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\View;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ViewTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['views'])) {
            return [];
        }

        $views = [];

        foreach ($tokens['views'] as $key => $value) {
            $views[] = $this->populateMetadata(
                new View(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'views' => $views,
        ];
    }
}
