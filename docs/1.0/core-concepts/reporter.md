---
title: Reporter
description: Learn about reporters and how they work.
breadcrumbs: [Documentation, Core Concepts, Reporter]
---

Reporters are used to transform the result of the build process into a summary. For example, the `YamlReporter` would transform the result into a YAML string, which would then be written to a file.

## Interface

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Reporter\Report;

interface ReporterInterface
{
    public function encode(GeneratorResult $result): Report;

    public function decode(string $path): GeneratorResult;
}
```

## Example

```php
<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Reporter;

use BaseCodeOy\Arch\Contract\ReporterInterface;
use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Path;
use Illuminate\Support\Facades\File;
use Symfony\Component\Serializer\Encoder\YamlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final readonly class YamlReporter implements ReporterInterface
{
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new YamlEncoder()]);
    }

    public function encode(GeneratorResult $result): Report
    {
        return new Report(
            path: Path::arch('report.yaml'),
            contents: $this->serializer->encode(
                $result->toArray(),
                'yaml',
                [YamlEncoder::YAML_INLINE => 32],
            ),
        );
    }

    public function decode(string $path): GeneratorResult
    {
        return $this->serializer->deserialize(File::get($path), GeneratorResult::class, 'yaml');
    }
}
```

## References

- [JsonReporter](https://github.com/basecodeoy/laravel-arch/tree/main/src/Reporter/JsonReporter.php)
- [YamlReporter](https://github.com/basecodeoy/laravel-arch/tree/main/src/Reporter/YamlReporter.php)
