<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

use BombenProdukt\Arch\Model\GeneratorResult;
use BombenProdukt\Arch\Reporter\Report;

interface ReporterInterface
{
    public function encode(GeneratorResult $result): Report;

    public function decode(string $path): GeneratorResult;
}
