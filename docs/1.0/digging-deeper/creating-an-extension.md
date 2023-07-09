---
title: Creating an Extension
description: Learn how to create an extension to add new functionality.
breadcrumbs: [Documentation, Digging Deeper, Creating an Extension]
---

Lets say you want to add a new generator to Arch. You can do this by creating a new extension. An extension is a class that implements the `BombenProdukt\Arch\Extension\ExtensionInterface` interface. The interface has one method `register` which is called when the extension is loaded. The `register` method receives the configuration for the extension.

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Extension;

interface ExtensionInterface
{
    public function register(array $configuration): void;
}
```

Given this interface, we can create a new extension that registers a new generator. The extension will register the `CustomGenerator` class as a generator. This will make it available to the `arch:build` command.

```php
<?php

declare(strict_types=1);

namespace App\Arch\Extension;

use App\Arch\Generator\CustomGenerator;
use BombenProdukt\Arch\Environment\Facade\Environment;
use BombenProdukt\Arch\Extension\ExtensionInterface;

final readonly class CustomExtension implements ExtensionInterface
{
    public function register(array $configuration): void
    {
        Environment::generators()->add(CustomGenerator::class);
    }
}
```

The extension can be registered in the `extensions` array in the `arch.php` configuration file. The key is the fully qualified class name of the extension and the value is the configuration for the extension.

```php
<?php

return [

    // ...

    'extensions' => [
        App\Arch\Extension\CustomExtension::class => [],
    ],

    // ...

];
```

And that's it! Arch will now use the `CustomGenerator` class in the `arch:build` command. **Happy coding!**

::: info
Extensions are a great way to add new functionality to Arch. You can release your extension as a composer package and share it with the world, or keep it private and use it in your own projects by storing the extensions in the `App\Arch\Extension` directory.
:::
