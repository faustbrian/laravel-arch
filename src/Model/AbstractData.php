<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

use BaseCodeOy\Arch\Contract\ModelInterface;
use BaseCodeOy\Arch\Facade\Environment;
use BaseCodeOy\Arch\Model\Concern\ManagesMetadata;
use Illuminate\Support\Str;

abstract class AbstractData implements ModelInterface
{
    use ManagesMetadata;

    protected ?string $namespace = null;

    #[\Override()]
    public function fullyQualifiedNamespace(): string
    {
        if ($this->namespace !== null) {
            return $this->namespace;
        }

        return Environment::generators()->findByAccessor($this->accessor())->namespace();
    }

    #[\Override()]
    public function fullyQualifiedClassName(): string
    {
        return $this->fullyQualifiedNamespace().'\\'.$this->name();
    }

    #[\Override()]
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
        $this->namespace = \in_array(\trim(\implode('\\', \array_slice(\explode('\\', \str_replace('/', '\\', $fqcn)), 0, -1)), '\\'), ['', '0'], true) ? null : \trim(\implode('\\', \array_slice(\explode('\\', \str_replace('/', '\\', $fqcn)), 0, -1)), '\\');
    }

    protected function accessor(): string
    {
        return Str::of(class_basename(static::class))->camel()->plural()->toString();
    }
}
