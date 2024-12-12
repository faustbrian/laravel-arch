<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model\Model\Relationship;

use Illuminate\Support\Str;

abstract class AbstractRelationship implements RelationshipInterface
{
    public static function fromString(string $value): static
    {
        $properties = \array_map(
            function (string $property): mixed {
                if (\in_array($property, ['true', 'false'], true)) {
                    return (bool) $property;
                }

                return $property;
            },
            \explode(' ', $value),
        );

        return new static(...$properties);
    }

    #[\Override()]
    public function identifier(): string
    {
        return Str::classNameCamel(static::class);
    }

    #[\Override()]
    public function import(): string
    {
        return 'Illuminate\\Database\\Eloquent\\Relations\\'.Str::classNameStudly(static::class);
    }

    #[\Override()]
    public function relationship(): string
    {
        $name = \method_exists($this, 'related') ? $this->related() : $this->name();

        $name = Str::of($name)->camel();

        if (\str_contains($this->identifier(), 'Many')) {
            return $name->plural()->toString();
        }

        return $name->singular()->toString();
    }

    #[\Override()]
    abstract public function toArray(): array;
}
