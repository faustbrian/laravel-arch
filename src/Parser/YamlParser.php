<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Parser;

use BaseCodeOy\Arch\Contract\ParserInterface;
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
