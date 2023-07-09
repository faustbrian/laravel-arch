---
title: Mails
description: Learn how to generate mails
breadcrumbs: [Documentation, Generators, Mails]
---

::: info
This page will describe how [mails](https://laravel.com/docs/10.x/mail) can be generated.
:::

## Examples

### [Mail](https://laravel.com/docs/10.x/mail#writing-mailables)

```yaml
arch: 1.0.0
definitions:
 mails:
   OrderShipped:
     subject: Order Shipped
```

### [Mail With Constructor](https://laravel.com/docs/10.x/mail#writing-mailables)

```yaml
arch: 1.0.0
definitions:
  mails:
    OrderShippedWithConstructor:
      subject: Order Shipped
      metadata:
        constructor:
          properties:
            key: string
```

### [Queued](https://laravel.com/docs/10.x/mail#queueing-mail)

```yaml
arch: 1.0.0
definitions:
  mails:
    OrderShippedQueued:
      subject: Order Shipped
      shouldQueue: true
```

### [Markdown](https://laravel.com/docs/10.x/mail#markdown-mailables)

```yaml
arch: 1.0.0
definitions:
  mails:
    OrderShippedWithMarkdown:
      subject: Order Shipped
      shouldBeMarkdown: true
```

### [Markdown](https://laravel.com/docs/10.x/mail#markdown-mailables) [Queued](https://laravel.com/docs/10.x/mail#queueing-mail)

```yaml
arch: 1.0.0
definitions:
  mails:
    OrderShippedWithMarkdownQueued:
      subject: Order Shipped
      shouldQueue: true
      shouldBeMarkdown: true
```
