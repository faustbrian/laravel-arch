---
title: Tokenizer
description: Learn about tokenizers and how they work.
breadcrumbs: [Documentation, Core Concepts, Tokenizer]
---

Tokenizers are used to transform tokens into normalized objects. For example, the `ControllerTokenizer` would transform a controller declaration into a `Controller` object, which would then be passed on to the `ControllerGenerator` class for further processing.

## Interface

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface TokenizerInterface
{
    public function tokenize(array $tokens): array;
}
```

## Example

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Tokenizer;

use BombenProdukt\Arch\Model\Job;

final readonly class JobTokenizer extends AbstractTokenizer
{
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['jobs'])) {
            return [];
        }

        $jobs = [];

        foreach ($tokens['jobs'] as $key => $value) {
            $jobs[] = $this->populateMetadata(
                new Job(
                    name: \is_numeric($key) ? $value : $key,
                    shouldQueue: $value['shouldQueue'] ?? false,
                    shouldBeUnique: $value['shouldBeUnique'] ?? false,
                ),
                $value,
            );
        }

        return [
            'jobs' => $jobs,
        ];
    }
}
```

## References

- [Laravel/CastTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/CastTokenizer.php)
- [Laravel/CommandTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/CommandTokenizer.php)
- [Laravel/ConfigurationTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ConfigurationTokenizer.php)
- [Laravel/ControllerTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ControllerTokenizer.php)
- [Laravel/EventTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/EventTokenizer.php)
- [Laravel/FactoryTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/FactoryTokenizer.php)
- [Laravel/FormRequestTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/FormRequestTokenizer.php)
- [Laravel/GlobalScopeTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/GlobalScopeTokenizer.php)
- [Laravel/JobTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/JobTokenizer.php)
- [Laravel/MailTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/MailTokenizer.php)
- [Laravel/MiddlewareTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/MiddlewareTokenizer.php)
- [Laravel/MigrationTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/MigrationTokenizer.php)
- [Laravel/ModelTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ModelTokenizer.php)
- [Laravel/NotificationTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/NotificationTokenizer.php)
- [Laravel/Nova/ActionTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/Nova/ActionTokenizer.php)
- [Laravel/Nova/DashboardTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/Nova/DashboardTokenizer.php)
- [Laravel/Nova/FilterTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/Nova/FilterTokenizer.php)
- [Laravel/Nova/LensTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/Nova/LensTokenizer.php)
- [Laravel/Nova/MetricTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/Nova/MetricTokenizer.php)
- [Laravel/Nova/ResourceTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/Nova/ResourceTokenizer.php)
- [Laravel/ObserverTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ObserverTokenizer.php)
- [Laravel/PivotTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/PivotTokenizer.php)
- [Laravel/PolicyTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/PolicyTokenizer.php)
- [Laravel/ResourceCollectionTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ResourceCollectionTokenizer.php)
- [Laravel/ResourceTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ResourceTokenizer.php)
- [Laravel/RouteTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/RouteTokenizer.php)
- [Laravel/RuleTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/RuleTokenizer.php)
- [Laravel/SeederTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/SeederTokenizer.php)
- [Laravel/ServiceProviderTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ServiceProviderTokenizer.php)
- [Laravel/StatementTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/StatementTokenizer.php)
- [Laravel/ViewComponentTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ViewComponentTokenizer.php)
- [Laravel/ViewComposerTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ViewComposerTokenizer.php)
- [Laravel/ViewTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Laravel/ViewTokenizer.php)
- [Livewire/ComponentTokenizer](https://github.com/faustbrian/laravel-arch/tree/main/src/Tokenizer/Livewire/ComponentTokenizer.php)
