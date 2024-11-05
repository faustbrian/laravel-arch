<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

use BaseCodeOy\Arch\Contract\ModelInterface;
use BaseCodeOy\Arch\Facade\Environment;
use BaseCodeOy\Arch\Model\Concern\ManagesMetadata;
use Illuminate\Support\Str;

abstract class AbstractData implements ModelInterface
{
    use ManagesMetadata;

    protected ?string $namespace = null;

    public function fullyQualifiedNamespace(): string
    {
        if ($this->namespace !== null) {
            return $this->namespace;
        }

        return Environment::generators()->findByAccessor($this->accessor())->namespace();
    }

    public function fullyQualifiedClassName(): string
    {
        return $this->fullyQualifiedNamespace().'\\'.$this->name();
    }

    abstract public function name(): string;

    protected function basename(string $fqcn, ?string $suffix = null): string
    {
        return Str::studly(
            Str::suffixless(
                Str::classNameStudly($fqcn),
                $suffix ?? Str::className(static::class),
            ),
        );
    }

    protected function normalizeNamespace(string $fqcn): void
    {
        $this->namespace = \trim(\implode('\\', \array_slice(\explode('\\', \str_replace('/', '\\', $fqcn)), 0, -1)), '\\') ?: null;
    }

    protected function accessor(): string
    {
        return Str::of(class_basename(static::class))->camel()->plural()->toString();
    }
}
