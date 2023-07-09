---
title: Models
description: Learn how to generate models
breadcrumbs: [Documentation, Generators, Models]
---

::: info
This page will describe how [models](https://laravel.com/docs/10.x/eloquent) can be generated.
:::

## Examples

### [Model](https://laravel.com/docs/10.x/eloquent#generating-model-classes)

```yaml
arch: 1.0.0
definitions:
  models:
    User:
      columns:
        name: string
        mail: string
```

### [Model With Relationships](https://laravel.com/docs/10.x/eloquent-relationships)

```yaml
arch: 1.0.0
definitions:
  models:
    User:
      columns:
        name: string
        mail: string
      relationships:
        hasMany: Comment
        hasManyThrough: Deployment Environment
        hasOneThrough: Owner Car
        belongsToMany: Comment
        hasOne: Comment
        belongsTo: Comment
        morphOne: Image imageable
        morphTo: Comment
        morphMany: Comment commentable
        morphToMany: Tag taggable
        morphedByMany: Post taggable
```

### [Model With Global Scopes](https://laravel.com/docs/10.x/eloquent#global-scopes)

```yaml
arch: 1.0.0
definitions:
  models:
    User:
      columns:
        name: string
        mail: string
      globalScopes:
        - Ancient
```

### [Model With Local Scopes](https://laravel.com/docs/10.x/eloquent#local-scopes)

```yaml
arch: 1.0.0
definitions:
  models:
    User:
      columns:
        name: string
        mail: string
      localScopes:
        - popular
```
