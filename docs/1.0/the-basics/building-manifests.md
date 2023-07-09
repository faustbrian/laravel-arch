---
title: Building Manifests
description: Learn how to create and build manifests
breadcrumbs: [Documentation, The Basics, Building Manifests]
---

A manifest is a file that describes the structure of your application. It is used by the `arch:build` command to create the files and folders of your application. By default the manifest is written in YAML and is located at `.arch/manifest.yaml` within your project directory or repository.

## Example

Let's say you want to create a blog application. You will need a `Post` model and a `Comment` model. The `Post` model will have a `hasMany` relationship with the `Comment` model and the `Comment` model will have a `belongsTo` relationship with the `Post` model.

### Manifest

```yaml
arch: 1.0.0
definitions:
  models:
    Post:
      columns:
        title: string
        content: longText
      relationships:
        hasMany: Comment
    Comment:
      columns:
        body: longText
      relationships:
        belongsTo: Post
```

The above manifest will generate the files and folders needed to create the blog application. The `arch:build` command will create the following files and folders:

### Output

```md
Created:
- app/Models/Comment.php
- app/Models/Post.php
- database/factories/CommentFactory.php
- database/factories/PostFactory.php
- database/migrations/2023_01_01_000000_create_posts_table.php
- database/migrations/2023_01_01_000001_create_comments_table.php
- database/seeders/CommentSeeder.php
- database/seeders/PostSeeder.php
- tests/Unit/Models/CommentTest.php
- tests/Unit/Models/PostTest.php
```

And that's it! You can now start working on your application. **Happy coding!**

::: info
You can change the location of the manifest that will be parsed by using the `--manifest` option of the `arch:build` command.
:::
