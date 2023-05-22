<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

use BombenProdukt\Arch\Model\Manifest;

interface ParserInterface
{
    public function parse(string $path): Manifest;
}
