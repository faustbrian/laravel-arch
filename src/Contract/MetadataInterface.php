<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Contract;

interface MetadataInterface
{
    public function metadata(): array;

    public function getMetadata(string $key, mixed $defaultValue = null): mixed;

    public function setMetadata(string $key, mixed $value): void;

    public function hasMetadata(string $key): bool;

    public function missingMetadata(string $key): bool;

    public function forgetMetadata(string $key): void;

    public function flushMetadata(): void;

    public function mergeMetadata(array $metadata): void;

    public function replaceMetadata(array $metadata): void;
}
