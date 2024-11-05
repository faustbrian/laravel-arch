---
title: Parser
description: Learn about parsers and how they work.
breadcrumbs: [Documentation, Core Concepts, Parser]
---

Parsers are used to parse manifest files. For example, the `YamlParser` can be used to parse a YAML manifest file into a `Manifest` object. This object will then be used by Arch to continue with the tokenization process to build a tree with all requested resources.

## Interface

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\Manifest;

interface ParserInterface
{
    public function parse(string $path): Manifest;
}
```

## Example

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Parser;

use BaseCodeOy\Arch\Model\Manifest;
use Illuminate\Support\Facades\File;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final readonly class YamlParser implements ParserInterface
{
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new YamlEncoder()]);
    }

    public function parse(string $path): Manifest
    {
        return $this->serializer->deserialize(File::get($path), Manifest::class, 'yaml');
    }
}
```

## References

- [JsonParser](https://github.com/basecodeoy/laravel-arch/tree/main/src/Parser/JsonParser.php)
- [YamlParser](https://github.com/basecodeoy/laravel-arch/tree/main/src/Parser/YamlParser.php)
