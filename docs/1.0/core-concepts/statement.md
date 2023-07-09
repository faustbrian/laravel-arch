---
title: Statement
description: Learn about statements and how they work.
breadcrumbs: [Documentation, Core Concepts, Statement]
---

Statements can be thought of as child generators. They are used to generate code for a specific part of the application. For example, the `RouteRedirectStatement` would generate code for a route redirect.

## Interface

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface StatementInterface
{
    public function code(array $context = []): string;

    public function test(array $context = []): string;

    public function imports(array $context = []): array;

    public function traits(array $context = []): array;
}
```

## Example

```php
<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement;

use BombenProdukt\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Redirect;

final readonly class RouteRedirectStatement implements StatementInterface
{
    public function __construct(
        private string $name,
        private ?array $parameters = [],
    ) {
        //
    }

    public function code(array $context = []): string
    {
        $hasParameters = \count($this->parameters) > 0;

        return \sprintf(
            $hasParameters ? "return Redirect::route('%s', %s);" : "return Redirect::route('%s');",
            $this->name,
            $hasParameters ? Arr::propertiesToArray($this->parameters) : '',
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('redirect/test/route', [
            'name' => $this->name,
        ]);
    }

    public function imports(array $context = []): array
    {
        return [
            Redirect::class,
        ];
    }

    public function traits(array $context = []): array
    {
        return [];
    }
}
```

## References

- [Inertia/RenderStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Inertia/RenderStatement.php)
- [Laravel/ActionRedirectStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/ActionRedirectStatement.php)
- [Laravel/AuthorizeStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/AuthorizeStatement.php)
- [Laravel/DispatchStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/DispatchStatement.php)
- [Laravel/EloquentStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/EloquentStatement.php)
- [Laravel/FireStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/FireStatement.php)
- [Laravel/MailStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/MailStatement.php)
- [Laravel/NotificationStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/NotificationStatement.php)
- [Laravel/NotifyStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/NotifyStatement.php)
- [Laravel/QueryStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/QueryStatement.php)
- [Laravel/ResourceCollectionStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/ResourceCollectionStatement.php)
- [Laravel/ResourceStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/ResourceStatement.php)
- [Laravel/RespondStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/RespondStatement.php)
- [Laravel/RouteRedirectStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/RouteRedirectStatement.php)
- [Laravel/SessionStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/SessionStatement.php)
- [Laravel/StatementInterface](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/StatementInterface.php)
- [Laravel/ValidateStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/ValidateStatement.php)
- [Laravel/ViewStatement](https://github.com/faustbrian/laravel-arch/tree/main/src/Statement/Laravel/ViewStatement.php)
