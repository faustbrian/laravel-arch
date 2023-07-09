---
title: Extension
description: Learn how to extend the package with your own generators and tokenizers.
breadcrumbs: [Documentation, Core Concepts, Extension]
---

Extensions are a way to extend the package with your own generators and tokenizers. This is useful if you want to generate something that is not supported by the package out of the box.

## Configuration

In order to use extensions, you need to register them in the `config/arch.php` file. The `extensions` key is an array of fully qualified class names that implements the `BombenProdukt\Arch\Extension\ExtensionInterface` interface. You can review the contents of the `config/arch.php` file [here](https://github.com/faustbrian/laravel-arch/blob/main/config/arch.php#L136-L149).

## Interface

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface ExtensionInterface
{
    public function register(array $configuration): void;
}
```

## Example

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Extension;

use BombenProdukt\Arch\Contract\ExtensionInterface;
use BombenProdukt\Arch\Facade\Environment;

final readonly class LaravelExtension implements ExtensionInterface
{
    public function register(array $configuration): void
    {
        foreach ($configuration['generators'] as $generator) {
            Environment::generators()->add($generator);
        }

        foreach ($configuration['statements'] as $statement) {
            Environment::statements()->add($statement);
        }

        foreach ($configuration['tokenizers'] as $tokenizerClassName => $tokenizerConfiguration) {
            if (\is_string($tokenizerClassName)) {
                Environment::tokenizers()->add($tokenizerClassName, $tokenizerConfiguration);
            } else {
                Environment::tokenizers()->add($tokenizerConfiguration);
            }
        }
    }
}
```

## References

- [InertiaExtension](https://github.com/faustbrian/laravel-arch/tree/main/src/Extension/InertiaExtension.php)
- [Laravel/NovaExtension](https://github.com/faustbrian/laravel-arch/tree/main/src/Extension/Laravel/NovaExtension.php)
- [LaravelExtension](https://github.com/faustbrian/laravel-arch/tree/main/src/Extension/LaravelExtension.php)
- [LivewireExtension](https://github.com/faustbrian/laravel-arch/tree/main/src/Extension/LivewireExtension.php)
