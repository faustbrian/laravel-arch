<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ViewComposer;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ViewComposerTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['viewComposers'])) {
            return [];
        }

        $viewComposers = [];

        foreach ($tokens['viewComposers'] as $key => $value) {
            $viewComposers[] = $this->populateMetadata(
                new ViewComposer(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'viewComposers' => $viewComposers,
        ];
    }
}
