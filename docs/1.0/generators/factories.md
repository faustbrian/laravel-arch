---
title: Factories
description: Learn how to generate Model factories
breadcrumbs: [Documentation, Generators, Model Factories]
---

::: info
This page will describe how [factories](https://laravel.com/docs/10.x/database-testing#writing-factories) can be generated.
:::

## Examples

### [Columns](https://laravel.com/docs/10.x/eloquent-factories#defining-model-factories)

```yaml
arch: 1.0.0
definitions:
  models:
    User:
      columns:
        id: id
        name: string
        email: string unique
        email_verified_at: timestamp nullable
        password: string
        remember_token: rememberToken
        current_team_id: foreignId nullable
        profile_photo_path: string:2048 nullable
        timestamps: timestamps

  factories:
    - User
```

### [Foreign Key](https://laravel.com/docs/10.x/eloquent-factories#defining-model-factories)

```yaml
arch: 1.0.0
definitions:
  models:
    Foreign:
      columns:
        team_id: unsignedInteger foreign

  factories:
    - Foreign
```

### [Morphs Relationship](https://laravel.com/docs/10.x/eloquent-factories#defining-model-factories)

```yaml
arch: 1.0.0
definitions:
  models:
    Morphs:
      columns:
        team: morphs

  factories:
    - Morphs
```
