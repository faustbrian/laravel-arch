---
title: Commands
description: Learn how to generate commands
breadcrumbs: [Documentation, Generators, Commands]
---

::: info
This page will describe how [commands](https://laravel.com/docs/10.x/artisan#writing-commands) can be generated.
:::

## Examples

### [Command](https://laravel.com/docs/10.x/artisan#writing-commands)

```yaml
arch: 1.0.0
definitions:
  commands:
    SendEmails:
      signature: 'mail:send {user}'
      description: 'Send a marketing email to a user'
```
