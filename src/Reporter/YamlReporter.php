<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Reporter;

use BombenProdukt\Arch\Contract\ReporterInterface;
use BombenProdukt\Arch\Model\GeneratorResult;
use BombenProdukt\Arch\Path;
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
