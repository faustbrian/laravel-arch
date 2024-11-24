---
title: Generator
description: Learn about generators and how they work.
breadcrumbs: [Documentation, Core Concepts, Generator]
---

Generators are used to generate files from tokens which were created by tokenizers. For example, the `JobGenerator` can be used to generate a job file from a `Job` object. This file can then be written to disk and used by the application.

## Interface

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\GeneratorResult;

interface GeneratorInterface
{
    public function generate(): void;

    public function result(): GeneratorResult;
}
```

## Example

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class JobGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Job
         */
        foreach (Tree::get('jobs') as $job) {
            $this->createFile(
                $job->name(),
                $this->renderClass($job, $job->shouldQueue() ? 'laravel/job/queued' : 'laravel/job/job', [
                    'class' => $job->name(),
                ]),
            );
        }

        $this->persist();
    }
}
```

## References

- [Laravel/CastGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/CastGenerator.php)
- [Laravel/CommandGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/CommandGenerator.php)
- [Laravel/ControllerGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ControllerGenerator.php)
- [Laravel/ControllerTestGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ControllerTestGenerator.php)
- [Laravel/EventGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/EventGenerator.php)
- [Laravel/FactoryGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/FactoryGenerator.php)
- [Laravel/FormRequestGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/FormRequestGenerator.php)
- [Laravel/GlobalScopeGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/GlobalScopeGenerator.php)
- [Laravel/JobGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/JobGenerator.php)
- [Laravel/MailGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/MailGenerator.php)
- [Laravel/MiddlewareGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/MiddlewareGenerator.php)
- [Laravel/MigrationGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/MigrationGenerator.php)
- [Laravel/ModelGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ModelGenerator.php)
- [Laravel/ModelTestGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ModelTestGenerator.php)
- [Laravel/NotificationGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/NotificationGenerator.php)
- [Laravel/Nova/ActionGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/Nova/ActionGenerator.php)
- [Laravel/Nova/DashboardGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/Nova/DashboardGenerator.php)
- [Laravel/Nova/FilterGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/Nova/FilterGenerator.php)
- [Laravel/Nova/LensGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/Nova/LensGenerator.php)
- [Laravel/Nova/MetricGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/Nova/MetricGenerator.php)
- [Laravel/Nova/ResourceGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/Nova/ResourceGenerator.php)
- [Laravel/ObserverGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ObserverGenerator.php)
- [Laravel/PivotGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/PivotGenerator.php)
- [Laravel/PolicyGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/PolicyGenerator.php)
- [Laravel/ResourceCollectionGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ResourceCollectionGenerator.php)
- [Laravel/ResourceGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ResourceGenerator.php)
- [Laravel/RouteGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/RouteGenerator.php)
- [Laravel/RuleGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/RuleGenerator.php)
- [Laravel/SeederGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/SeederGenerator.php)
- [Laravel/ServiceProviderGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ServiceProviderGenerator.php)
- [Laravel/ViewComponentGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ViewComponentGenerator.php)
- [Laravel/ViewComposerGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ViewComposerGenerator.php)
- [Laravel/ViewGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Laravel/ViewGenerator.php)
- [Livewire/ComponentGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Livewire/ComponentGenerator.php)
- [Livewire/TestGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Livewire/TestGenerator.php)
- [Livewire/ViewGenerator](https://github.com/basecodeoy/laravel-arch/tree/main/src/Generator/Livewire/ViewGenerator.php)
