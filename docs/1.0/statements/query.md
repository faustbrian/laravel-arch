---
title: Query
description: Learn how to use query statements
breadcrumbs: [Documentation, Statements, Query]
---

::: info
This page will describe how [queries](https://laravel.com/docs/10.x/queries) can be used in a controller.
:::

## Examples

### Get all records

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - query: all
```

### Count all records

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - query: count
```

### Check if a record exists

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - query: exists
```

### Paginate all records

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - query: paginate
```

### Paginate all records (Simple)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - query: simplePaginate
```

### With One Clause

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - query: where:post.title take:3 pluck:post.id
```

### With Many Clauses

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      User:
        methods:
          index:
            - query: where:title where:content order:published_at limit:5
```
