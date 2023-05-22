<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Parser;

use BombenProdukt\Arch\Contract\ParserInterface;
use BombenProdukt\Arch\Model\Manifest;
use Illuminate\Support\Facades\File;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

final readonly class JsonParser implements ParserInterface
{
    private Serializer $serializer;

    public function __construct()
    {
        $this->serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
    }

    public function parse(string $path): Manifest
    {
        return $this->serializer->deserialize(File::get($path), Manifest::class, 'json');
    }
}
