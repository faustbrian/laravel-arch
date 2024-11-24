---
title: Jobs
description: Learn how to generate jobs
breadcrumbs: [Documentation, Generators, Jobs]
---

::: info
This page will describe how [jobs](https://laravel.com/docs/10.x/queues) can be generated.
:::

## Examples

### [Job](https://laravel.com/docs/10.x/queues#creating-jobs)

```yaml
arch: 1.0.0
definitions:
  jobs:
    - WithoutParameters
```

### [Job With Constructor](https://laravel.com/docs/10.x/queues#creating-jobs)

```yaml
arch: 1.0.0
definitions:
  jobs:
    WithParameters:
      metadata:
        constructor:
          properties:
            name: string
            mail: string
```

### [Queued](https://laravel.com/docs/10.x/queues#customizing-the-queue-and-connection)

```yaml
arch: 1.0.0
definitions:
  jobs:
    QueuedWithoutParameters:
      shouldQueue: true
```

### [Unique](https://laravel.com/docs/10.x/queues#unique-jobs)

```yaml
arch: 1.0.0
definitions:
  jobs:
    QueuedWithoutParameters:
      shouldBeUnique: true
```

### [Unique](https://laravel.com/docs/10.x/queues#unique-jobs) [Queued](https://laravel.com/docs/10.x/queues#customizing-the-queue-and-connection)

```yaml
arch: 1.0.0
definitions:
  jobs:
    QueuedWithParameters:
      shouldBeUnique: true
      shouldQueue: true
```
