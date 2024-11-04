---
title: Migrations
description: Learn how to generate migrations
breadcrumbs: [Documentation, Generators, Migrations]
---

::: info
This page will describe how [migrations](https://laravel.com/docs/10.x/migrations) can be generated.
:::

## Examples

### [Migration](https://laravel.com/docs/10.x/migrations#generating-migrations)

```yaml
arch: 1.0.0
definitions:
  migrations:
    create_users_table:
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
```

### [BelongsTo Relationship](https://laravel.com/docs/10.x/migrations#foreign-key-constraints)

```yaml
arch: 1.0.0
definitions:
  migrations:
    create_users_table:
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
      relationships:
        belongsToMany: Role
```

### [MorphedByMany Relationship](https://laravel.com/docs/10.x/migrations#foreign-key-constraints)

```yaml
arch: 1.0.0
definitions:
  migrations:
    create_users_table:
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
      relationships:
        morphedByMany: Tag taggable
```
