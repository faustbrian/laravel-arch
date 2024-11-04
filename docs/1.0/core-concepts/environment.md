---
title: Environment
description: Learn about the environment and how it works.
breadcrumbs: [Documentation, Core Concepts, Environment]
---

The `Environment` class forms the core of the package. In itself, it possesses no functionality. Instead, it serves as a container for repositories that store the generators, statements, and tokenizers. This setup allows these elements to be accessible from anywhere in your application. The most common use-cases involve accessing the environment from an extension to register generators and tokenizers, or from a tokenizer to retrieve a statement based on its methods.

## Interface

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Environment\GeneratorRepository;
use BaseCodeOy\Arch\Environment\StatementRepository;
use BaseCodeOy\Arch\Environment\TokenizerRepository;

interface EnvironmentInterface
{
    public function generators(): GeneratorRepository;

    public function statements(): StatementRepository;

    public function tokenizers(): TokenizerRepository;
}
```

## Example

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Extension;

use BaseCodeOy\Arch\Environment\Facade\Environment;

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

        foreach ($configuration['tokenizers'] as $tokenizer) {
            Environment::tokenizers()->add($tokenizer);
        }
    }
}
```

## References

- [Environment](https://github.com/basecodeoy/laravel-arch/blob/main/src/Environment/Environment.php)
