---
title: Controllers
description: Learn how to generate controllers
breadcrumbs: [Documentation, Generators, Controllers]
---

::: info
This page will describe how [controllers](https://laravel.com/docs/10.x/controllers) can be generated.
:::

## Examples

### [Basic Controller](https://laravel.com/docs/10.x/controllers#basic-controllers)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      Plain:
        plain: true
```


### [Resource Controller](https://laravel.com/docs/10.x/controllers#resource-controllers)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      Resource:
        methods: ['index', 'store', 'update']
```

### [Partial Resource Routes](https://laravel.com/docs/10.x/controllers#restful-partial-resource-routes)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      ResourceWithMethods:
        methods:
          index:
            - view: post.index with:posts
          create:
            - view: post.create
          store:
            - redirect: post.index
```

### [Singleton Resource Controllers](https://laravel.com/docs/10.x/controllers#singleton-resource-controllers)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      Singleton:
        singleton: true
        methods: ['store', 'update']
```

### [Nested Resources](https://laravel.com/docs/10.x/controllers#restful-nested-resources)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      Parent/Nested:
        methods: ['index', 'store', 'update']
```

### [Nested Singleton](https://laravel.com/docs/10.x/controllers#singleton-resource-controllers)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      Parent/NestedSingleton:
        singleton: true
        methods: ['store', 'update']
```

### [Single Action Controllers](https://laravel.com/docs/10.x/controllers#single-action-controllers)

```yaml
arch: 1.0.0
definitions:
  controllers:
    web:
      Invokable:
        invokable: true
```
