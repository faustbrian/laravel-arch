---
title: Nova Filters
description: Learn how to generate Laravel Nova filters
breadcrumbs: [Documentation, Generators, Nova, Filters]
---

::: info
This page will describe how [Nova filters](https://nova.laravel.com/docs/4.0/filters/defining-filters.html) can be generated.
:::

## Examples

### [Select Filter](https://nova.laravel.com/docs/4.0/filters/defining-filters.html#select-filters)

```yaml
arch: 1.0.0
definitions:
  novaFilters:
    - UserType
```

### [Boolean Filter](https://nova.laravel.com/docs/4.0/filters/defining-filters.html#boolean-filters)

```yaml
arch: 1.0.0
definitions:
  novaFilters:
    UserType: boolean
```

### [Date Filter](https://nova.laravel.com/docs/4.0/filters/defining-filters.html#date-filters)

```yaml
arch: 1.0.0
definitions:
  novaFilters:
    UserType: date
```
