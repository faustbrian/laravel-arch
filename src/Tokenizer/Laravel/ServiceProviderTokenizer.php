<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\ServiceProvider;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;

final readonly class ServiceProviderTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['serviceProviders'])) {
            return [];
        }

        $serviceProviders = [];

        foreach ($tokens['serviceProviders'] as $key => $value) {
            $serviceProviders[] = $this->populateMetadata(
                new ServiceProvider(
                    name: \is_numeric($key) ? $value : $key,
                ),
                $value,
            );
        }

        return [
            'serviceProviders' => $serviceProviders,
        ];
    }
}
