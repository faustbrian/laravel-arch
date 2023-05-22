<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model\Model\Relationship;

abstract readonly class RelationshipFactory
{
    public static function make(string $type, array $parameters): RelationshipInterface
    {
        return match ($type) {
            'belongsTo' => new BelongsTo(...$parameters),
            'belongsToMany' => new BelongsToMany(...$parameters),
            'hasMany' => new HasMany(...$parameters),
            'hasManyThrough' => new HasManyThrough(...$parameters),
            'hasOne' => new HasOne(...$parameters),
            'hasOneThrough' => new HasOneThrough(...$parameters),
            'morphedByMany' => new MorphedByMany(...$parameters),
            'morphMany' => new MorphMany(...$parameters),
            'morphOne' => new MorphOne(...$parameters),
            'morphTo' => new MorphTo(...$parameters),
            'morphToMany' => new MorphToMany(...$parameters),
        };
    }

    public static function makeFromString(string $type, string $parameters): RelationshipInterface
    {
        return match ($type) {
            'belongsTo' => BelongsTo::fromString($parameters),
            'belongsToMany' => BelongsToMany::fromString($parameters),
            'hasMany' => HasMany::fromString($parameters),
            'hasManyThrough' => HasManyThrough::fromString($parameters),
            'hasOne' => HasOne::fromString($parameters),
            'hasOneThrough' => HasOneThrough::fromString($parameters),
            'morphedByMany' => MorphedByMany::fromString($parameters),
            'morphMany' => MorphMany::fromString($parameters),
            'morphOne' => MorphOne::fromString($parameters),
            'morphTo' => MorphTo::fromString($parameters),
            'morphToMany' => MorphToMany::fromString($parameters),
        };
    }
}
