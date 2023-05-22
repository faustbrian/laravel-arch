<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

use BombenProdukt\Arch\Model\GeneratorResult;

interface GeneratorInterface
{
    public function generate(): void;

    public function result(): GeneratorResult;
}
