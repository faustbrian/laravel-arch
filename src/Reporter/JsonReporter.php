<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Reporter;

use BaseCodeOy\Arch\Contract\ReporterInterface;
use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Path;
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
            path: $this->filePath(),
            contents: $this->serializer->encode(
                $result->toArray(),
                'json',
                [JsonEncode::OPTIONS => \JSON_PRETTY_PRINT],
            ),
        );
    }

    public function decode(): GeneratorResult
    {
        return $this->serializer->deserialize(File::get($this->filePath()), GeneratorResult::class, 'json');
    }

    public function exists(): bool
    {
        return File::exists($this->filePath());
    }

    private function filePath(): string
    {
        return Path::arch('report.json');
    }
}
