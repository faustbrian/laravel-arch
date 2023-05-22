<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer\Laravel;

use BombenProdukt\Arch\Model\ServiceProvider;
use BombenProdukt\Arch\Tokenizer\AbstractTokenizer;

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
