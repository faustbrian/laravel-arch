<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Contract;

interface ModelInterface extends MetadataInterface
{
    public function name(): string;

    public function fullyQualifiedNamespace(): string;

    public function fullyQualifiedClassName(): string;
}
