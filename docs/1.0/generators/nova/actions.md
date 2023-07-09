---
title: Nova Actions
description: Learn how to generate Laravel Nova actions
breadcrumbs: [Documentation, Generators, Nova, Actions]
---

::: info
This page will describe how [Nova actions](https://nova.laravel.com/docs/4.0/actions/defining-actions.html) can be generated.
:::

## Examples

### [Action](https://nova.laravel.com/docs/4.0/actions/defining-actions.html)

```yaml
arch: 1.0.0
definitions:
  novaActions:
    - EmailAccountProfile
```

### [Queued](https://nova.laravel.com/docs/4.0/actions/defining-actions.html#queued-actions)

```yaml
arch: 1.0.0
definitions:
  novaActions:
    EmailAccountProfile:
      shouldBeQueued: true
```

### [Destructive](https://nova.laravel.com/docs/4.0/actions/defining-actions.html#destructive-actions)

```yaml
arch: 1.0.0
definitions:
  novaActions:
    DeleteUserData:
      shouldBeDestructive: true
```

### [Destructive](https://nova.laravel.com/docs/4.0/actions/defining-actions.html#destructive-actions) [Queued](https://nova.laravel.com/docs/4.0/actions/defining-actions.html#queued-actions)

```yaml
arch: 1.0.0
definitions:
  novaActions:
    DeleteUserData:
      shouldBeDestructive: true
      shouldBeQueued: true
```
