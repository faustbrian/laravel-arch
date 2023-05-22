<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Model\Relationship;

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

    public function identifier(): string
    {
        return Str::classNameCamel(static::class);
    }

    public function import(): string
    {
        return 'Illuminate\\Database\\Eloquent\\Relations\\'.Str::classNameStudly(static::class);
    }

    public function relationship(): string
    {
        if (\method_exists($this, 'related')) {
            $name = $this->related();
        } else {
            $name = $this->name();
        }

        $name = Str::of($name)->camel();

        if (\str_contains($this->identifier(), 'Many')) {
            return $name->plural()->toString();
        }

        return $name->singular()->toString();
    }

    abstract public function toArray(): array;
}
