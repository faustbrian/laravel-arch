<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Environment;

final class GeneratorRepository
{
    /**
     * @var Generator[]
     */
    private array $generators = [];

    public function __construct()
    {
        //
    }

    /**
     * @var Generator[]
     */
    public function all(): array
    {
        return $this->generators;
    }

    public function add(array $generator): void
    {
        $this->generators[] = new Generator(...$generator);
    }

    public function findByAccessor(string $accessor): Generator
    {
        return head(\array_filter($this->generators, fn (Generator $generator) => $generator->accessor() === $accessor));
    }
}
