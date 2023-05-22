<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Reporter;

use BombenProdukt\Arch\Contract\ReporterInterface;
use BombenProdukt\Arch\Model\GeneratorResult;
use BombenProdukt\Arch\Path;
use Illuminate\Support\Facades\File;
use Symfony\Component\Serializer\Encoder\JsonEncode;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final readonly class JsonReporter implements ReporterInterface
{
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function encode(GeneratorResult $result): Report
    {
        return new Report(
            path: Path::arch('report.json'),
            contents: $this->serializer->encode(
                $result->toArray(),
                'json',
                [JsonEncode::OPTIONS => \JSON_PRETTY_PRINT],
            ),
        );
    }

    public function decode(string $path): GeneratorResult
    {
        return $this->serializer->deserialize(File::get($path), GeneratorResult::class, 'json');
    }
}
