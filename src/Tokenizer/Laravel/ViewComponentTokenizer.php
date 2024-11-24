<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ViewComponent;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ViewComponentTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['viewComponents'])) {
            return [];
        }

        $viewComponents = [];

        foreach ($tokens['viewComponents'] as $key => $value) {
            $viewComponents[] = $this->populateMetadata(
                new ViewComponent(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'viewComponents' => $viewComponents,
        ];
    }
}
