---
title: Events
description: Learn how to generate events
breadcrumbs: [Documentation, Generators, Events]
---

::: info
This page will describe how [events](https://laravel.com/docs/10.x/events) can be generated.
:::

## Examples

### [Event](https://laravel.com/docs/10.x/events#generating-events-and-listeners)

```yaml
arch: 1.0.0
definitions:
  events:
    - InvoicePaid
```

### [Constructor Properties](https://laravel.com/docs/10.x/events#generating-events-and-listeners)

```yaml
arch: 1.0.0
definitions:
  events:
    InvoicePaid:
      metadata:
        constructor:
          properties:
            name: string
            mail:
                type: string
                visibility: private
```

### [Broadcasting](https://laravel.com/docs/10.x/broadcasting#the-shouldbroadcast-interface)

```yaml
arch: 1.0.0
definitions:
  events:
    InvoicePaid:
      shouldBroadcast: true
```
