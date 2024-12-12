<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Tokenizer\Laravel;

use BaseCodeOy\Arch\Model\Column;
use BaseCodeOy\Arch\Model\Controller;
use BaseCodeOy\Arch\Model\Factory;
use BaseCodeOy\Arch\Model\FormRequest;
use BaseCodeOy\Arch\Model\Index;
use BaseCodeOy\Arch\Model\Migration;
use BaseCodeOy\Arch\Model\Model;
use BaseCodeOy\Arch\Model\Model\Cast;
use BaseCodeOy\Arch\Model\Model\GlobalScope;
use BaseCodeOy\Arch\Model\Model\LocalScope;
use BaseCodeOy\Arch\Model\Model\Relationship\RelationshipFactory;
use BaseCodeOy\Arch\Model\Policy;
use BaseCodeOy\Arch\Model\Resource;
use BaseCodeOy\Arch\Model\Seeder;
use BaseCodeOy\Arch\Tokenizer\AbstractTokenizer;
use BaseCodeOy\Arch\Transformer\RuleTransformer;
use Illuminate\Support\Arr;

final readonly class ModelTokenizer extends AbstractTokenizer
{
    #[\Override()]
    public function tokenize(array $tokens): array
    {
        if (empty($tokens['models'])) {
            return [];
        }

        $result = [
            'factories' => [],
            'migrations' => [],
            'models' => [],
            'seeders' => [],
        ];

        foreach ($tokens['models'] as $key => $value) {
            $model = $this->buildModel($key, $value);

            $result['models'][$key] = $this->populateMetadata($model, $value);

            foreach ($this->configurationKeys() as $configurationKey) {
                if ($this->configuration($configurationKey)) {
                    $result = \array_merge_recursive($result, $this->{$configurationKey}($model));
                }
            }

            if ($this->configuration && (\array_key_exists('globalScopes', $value) && \is_array($value['globalScopes']))) {
                foreach ($value['globalScopes'] as $globalScope) {
                    $globalScope = new GlobalScope($globalScope);

                    $model->addGlobalScope($globalScope);

                    $result['globalScopes'][] = $globalScope;
                }
            }

            if (\array_key_exists('localScopes', $value) && \is_array($value['localScopes'])) {
                foreach ($value['localScopes'] as $localScope) {
                    $model->addLocalScope(new LocalScope($localScope));
                }
            }
        }

        return $result;
    }

    private function buildModel(string $modelName, array $modelDefinition): Model
    {
        $model = new Model($modelName);

        foreach ($modelDefinition['columns'] as $name => $columnDefinition) {
            $model->addColumn(
                $this->buildColumn($name, $columnDefinition),
            );
        }

        if (\array_key_exists('relationships', $modelDefinition) && \is_array($modelDefinition['relationships'])) {
            foreach ($modelDefinition['relationships'] as $relationshipType => $relationships) {
                if (\is_string($relationships)) {
                    foreach (\explode(',', $relationships) as $relationshipSegment) {
                        $model->addRelationship(
                            RelationshipFactory::makeFromString(
                                $relationshipType,
                                $relationshipSegment,
                            ),
                        );
                    }
                } else {
                    foreach ($relationships as $relationship) {
                        $model->addRelationship(
                            RelationshipFactory::make(
                                $relationshipType,
                                Arr::except($relationship, 'type'),
                            ),
                        );
                    }
                }
            }
        }

        if (\array_key_exists('indexes', $modelDefinition)) {
            foreach ($modelDefinition['indexes'] as $index) {
                $model->addIndex(new Index(\key($index), \array_map('trim', \explode(',', (string) \current($index)))));
            }
        }

        if (\array_key_exists('casts', $modelDefinition)) {
            foreach ($modelDefinition['casts'] as $castKey => $castValue) {
                $model->addCast(new Cast(name: $castKey, type: $castValue));
            }
        }

        return $model;
    }

    private function buildColumn(string $name, mixed $definition): Column
    {
        $dataType = null;
        $modifiers = [];

        foreach (\explode(' ', (string) $definition) as $token) {
            $parts = \explode(':', $token);
            $columnName = $parts[0];

            if ($this->isColumnType($columnName)) {
                $attributes = $parts[1] ?? null;
                $dataType = $columnName;

                if ($attributes !== null && $attributes !== '' && $attributes !== '0') {
                    $attributes = \explode(',', $attributes);

                    if ($dataType === 'enum') {
                        $attributes = \array_map(fn ($attribute): string => \trim($attribute, '"'), $attributes);
                    }
                }
            }

            if ($this->isModifier($columnName)) {
                $modifiers[] = empty($parts[1]) ? $columnName : [$columnName => $parts[1]];
            }
        }

        if ($dataType === null) {
            $isForeignKey = collect($modifiers)->contains(fn ($modifier): bool => (\is_array($modifier) && \key($modifier) === 'foreign') || $modifier === 'foreign');

            $dataType = $isForeignKey ? 'id' : 'string';
        }

        return new Column($name, $dataType, $modifiers, $attributes ?? []);
    }

    /**
     * @see https://laravel.com/docs/10.x/migrations#available-column-types
     */
    private function isColumnType(string $columnName): bool
    {
        return \in_array($columnName, [
            'bigIncrements',
            'bigInteger',
            'binary',
            'boolean',
            'char',
            'dateTimeTz',
            'dateTime',
            'date',
            'decimal',
            'double',
            'enum',
            'float',
            'foreignId',
            'foreignIdFor',
            'foreignUlid',
            'foreignUuid',
            'geometryCollection',
            'geometry',
            'id',
            'increments',
            'integer',
            'ipAddress',
            'json',
            'jsonb',
            'lineString',
            'longText',
            'macAddress',
            'mediumIncrements',
            'mediumInteger',
            'mediumText',
            'morphs',
            'multiLineString',
            'multiPoint',
            'multiPolygon',
            'nullableMorphs',
            'nullableTimestamps',
            'nullableUlidMorphs',
            'nullableUuidMorphs',
            'point',
            'polygon',
            'rememberToken',
            'set',
            'smallIncrements',
            'smallInteger',
            'softDeletesTz',
            'softDeletes',
            'string',
            'text',
            'timeTz',
            'time',
            'timestampTz',
            'timestamp',
            'timestampsTz',
            'timestamps',
            'tinyIncrements',
            'tinyInteger',
            'tinyText',
            'unsignedBigInteger',
            'unsignedDecimal',
            'unsignedInteger',
            'unsignedMediumInteger',
            'unsignedSmallInteger',
            'unsignedTinyInteger',
            'ulidMorphs',
            'uuidMorphs',
            'ulid',
            'uuid',
            'year',
        ], true);
    }

    private function isModifier(string $columnName): bool
    {
        return \in_array($columnName, [
            'autoIncrement',
            'charset',
            'collation',
            'default',
            'nullable',
            'unsigned',
            'useCurrent',
            'useCurrentOnUpdate',
            'always',
            'unique',
            'index',
            'primary',
            'foreign',
            'onDelete',
            'onUpdate',
            'comment',
        ], true);
    }

    private function addController(Model $model): array
    {
        return [
            'controllers' => [
                new Controller(
                    name: $model->name(),
                    model: $model->name(),
                    group: 'web',
                    authorizeResource: true,
                ),
            ],
        ];
    }

    private function addFactory(Model $model): array
    {
        return [
            'factories' => [
                new Factory($model->name()),
            ],
        ];
    }

    private function addMigration(Model $model): array
    {
        return [
            'migrations' => [
                new Migration($model->tableName(), $model->columns(), $model->indexes()),
            ],
        ];
    }

    private function addPolicy(Model $model): array
    {
        return [
            'policies' => [
                new Policy($model->name()),
            ],
        ];
    }

    private function addResource(Model $model): array
    {
        return [
            'resources' => [
                new Resource($model->name()),
            ],
        ];
    }

    private function addSeeder(Model $model): array
    {
        return [
            'seeders' => [
                new Seeder($model->name()),
            ],
        ];
    }

    private function addFormRequests(Model $model): array
    {
        return [
            'formRequests' => [
                $this->buildStoreFormRequest($model),
                $this->buildUpdateFormRequest($model),
            ],
        ];
    }

    private function buildStoreFormRequest(Model $model): FormRequest
    {
        $rules = [];

        foreach ($model->columns() as $column) {
            $rules[$column->name()] = RuleTransformer::fromColumn($model->tableName(), $column);
        }

        return new FormRequest(
            name: 'Store'.$model->name(),
            rules: $rules,
        );
    }

    private function buildUpdateFormRequest(Model $model): FormRequest
    {
        $rules = [];

        foreach ($model->columns() as $column) {
            $rules[$column->name()] = RuleTransformer::fromColumn($model->tableName(), $column);
        }

        return new FormRequest(
            name: 'Update'.$model->name(),
            rules: $rules,
        );
    }

    private function configurationKeys(): array
    {
        return [
            'addController',
            'addFormRequests',
            'addFactory',
            'addMigration',
            'addPolicy',
            'addResource',
            'addSeeder',
        ];
    }
}
