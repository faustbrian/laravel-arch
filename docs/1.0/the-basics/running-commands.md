---
title: Running Commands
description: Learn how to run commands via the Artisan CLI
breadcrumbs: [Documentation, The Basics, Running Commands]
---

Arch comes with a few commands out of the box. You can see a list of all available commands by running `php artisan arch:` from the root of your project.

## Setup

The `arch:setup` command will create a new project in the current directory. This command will create the `.arch` directory with all the necessary files and directories. It will also create the `manifest.yaml` file, ready for you to edit.

```shell
$ php artisan arch:setup
```

## Build

The `arch:build` command will build your project. This command will parse the definitions in your `manifest.yaml` file. If you don't have a `manifest.yaml` file, it will prompt you to run the `arch:setup` command.

```shell
$ php artisan arch:build
```

## Purge

The `arch:purge` command will purge your project. This command will delete the `.arch` directory and all the files and directories inside it. It will also delete the `manifest.yaml` file and all the files and directories that were generated as a result of it.

```shell
$ php artisan arch:purge
```
