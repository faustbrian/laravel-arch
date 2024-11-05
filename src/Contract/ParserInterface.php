<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Model\Manifest;

interface ParserInterface
{
    public function parse(string $path): Manifest;
}
