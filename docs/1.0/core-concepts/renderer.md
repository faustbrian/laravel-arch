---
title: Renderer
description: Learn about renderers and how they work.
breadcrumbs: [Documentation, Core Concepts, Renderer]
---

Renders are used to render stubs. For example, the `StubClassRenderer` can be used to transform a stub template into a class file. This class can then be written to disk and used by the application.

## Class Renderer

### Interface

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface ClassRendererInterface
{
    public function render(string $path, array $context): string;
}
```

### Example

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

final readonly class StubClassRenderer implements ClassRendererInterface
{
    public function render(string $path, array $context): string
    {
        return '<?php'.\PHP_EOL.\PHP_EOL.(new StubFileRenderer())->render($path, $context);
    }
}
```

### References

- [BladeClassRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/BladeClassRenderer.php)
- [StubClassRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/StubClassRenderer.php)
- [TwigClassRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/TwigClassRenderer.php)

## File Renderer

### Interface

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface FileRendererInterface
{
    public function render(string $path, array $context): string;
}
```

### Example

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use Illuminate\Support\Facades\File;

final readonly class StubFileRenderer implements FileRendererInterface
{
    public function render(string $path, array $context): string
    {
        return (new StubStringRenderer())->render(File::stub("{$path}.stub"), $context);
    }
}
```

### References

- [BladeFileRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/BladeFileRenderer.php)
- [StubFileRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/StubFileRenderer.php)
- [TwigFileRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/TwigFileRenderer.php)

## String Renderer

### Interface

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface StringRendererInterface
{
    public function render(string $template, array $context): string;
}
```

### Example

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Renderer;

use Illuminate\Support\Str;

final readonly class StubStringRenderer implements StringRendererInterface
{
    public function render(string $template, array $context): string
    {
        return Str::of($template)->replace(
            \array_map(fn ($key) => "{{ {$key} }}", \array_keys($context)),
            \array_values($context),
        )->toString();
    }
}
```

### References

- [BladeStringRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/BladeStringRenderer.php)
- [StubStringRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/StubStringRenderer.php)
- [TwigStringRenderer](https://github.com/faustbrian/laravel-arch/tree/main/src/Renderer/TwigStringRenderer.php)
