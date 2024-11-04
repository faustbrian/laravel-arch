---
title: Configuration
description: Learn how to configure Laravel Arch
breadcrumbs: [Documentation, Getting Started, Configuration]
---

Arch comes with a configuration file that you can publish with the following command:

```bash
$ php artisan vendor:publish --tag="laravel-arch-config"
```

The published configuration file can be found at `config/arch.php`. You can review its contents via the following link: [faustbrian/laravel-arch/config/arch.php](https://github.com/basecodeoy/laravel-arch/blob/main/config/arch.php). Upon first glance, you'll see that the configuration file solely contains a call to the [Configuration](https://github.com/basecodeoy/laravel-arch/blob/main/src/Configuration.php) class.

The minimalist design of the configuration file is intentional. All configuration values are set in the `Configuration` class, simplifying the management of these values. This setup also facilitates your review of the configuration values.

Moreover, this approach assists in maintaining backward compatibility for configuration values. For example, should we change the name of a configuration value, we can ensure backward compatibility by adding a new configuration value under the old name. This new value would then return the updated configuration value.

## Modification

Suppose you want to load stubs from a different location due to a unique directory structure. You can easily achieve this by modifying the `stubPath` value in the configuration file. This can be done by calling the `stubPath` method on the `Configuration` class. You can make these changes by modifying the `config/arch.php` file as follows:

```php
<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Configuration;

return Configuration::make()
    ->stubPath(base_path('stubs'))
    ->toArray();
```

That being said, we have taken the liberty to set all values to sensible defaults for you right out of the box. However, you are entirely free to modify these values to suit your specific needs.

## Swap

As you review the configuration file, you'll notice that almost all of the internals can be swapped out. This is achieved by using the Fully Qualified Class Name (FQCN) of the desired extension. For instance, if you wish to use a different reporter, you can set the FQCN of the reporter via the `reporter` method.

```php
<?php

declare(strict_types=1);

use BaseCodeOy\Arch\Configuration;

return Configuration::make()
    ->reporter(\BaseCodeOy\Arch\Reporter\JsonReport::class)
    ->toArray();
```

**Arch, from the ground up, is designed to be extensible.** This means that all internals are built with extensibility in mind, following the same conventions as a third-party package. There are no special rules for third-party packages, and we encourage you to create your own extensions to expand or replace the functionality of the library to customize it according to your needs.

## Extensions

As mentioned above, Arch is designed to be extensible. This means that you can easily extend the library with third-party packages or create your own extensions. We will explore this in greater detail in the [Creating an Extension](/advanced/creating-an-extension)  section.

### Gotchas

Do keep in mind that, in the case of the `tokenizers` array, the order of the `tokenizers` is significant. The `tokenizers` are executed in the order they are defined in the array. This can potentially result in unwanted side-effects, depending on how you want to tokenize the manifest. For instance, many aspects will be inferred from or rely on the defined models. Due to this, we strongly recommend defining the `models` tokenizer first. This ensures that the models are defined before any other tokenizers are executed.
