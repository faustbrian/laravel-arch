---
title: Installation
description: Learn how to install Laravel Arch
breadcrumbs: [Documentation, Getting Started, Installation]
---

::: info
This package requires [PHP](https://www.php.net/) 8.2 or later, and it supports [Laravel](https://laravel.com/) 10 or later.
:::

## Composer

To get the latest version, simply require the project using [Composer](https://getcomposer.org/):

```bash
$ composer require --dev faustbrian/laravel-arch
```

You can publish the configuration file by using:

```bash
$ php artisan vendor:publish --tag="laravel-arch-config"
```

You can publish the stubs by using:

```bash
$ php artisan vendor:publish --tag="laravel-arch-stubs"
```

## Manifest

You can create the default manifest file by using:

```bash
$ php artisan arch:manifest
```

This will create an `manifest.yaml` file in the `.arch` directory. You will need to customize this file to fit your application requirements.

## Build

Once you've filled out the manifest you can build your application by using:

```bash
$ php artisan arch:build
```

This will generate the architecture for your application, including controllers, models, views, routes, tests, migrations and many more files.
