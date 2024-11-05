<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Model;

use BaseCodeOy\Arch\Model\Model\Cast;
use BaseCodeOy\Arch\Model\Model\GlobalScope;
use BaseCodeOy\Arch\Model\Model\LocalScope;
use BaseCodeOy\Arch\Model\Model\Relationship\BelongsToMany;
use BaseCodeOy\Arch\Model\Model\Relationship\MorphedByMany;
use BaseCodeOy\Arch\Model\Model\Relationship\RelationshipInterface;
use Illuminate\Support\Str;

final class Model extends AbstractData
{
    /**
     * @var Column[]
     */
    private array $columns = [];

    /**
     * @var Index[]
     */
    private array $indexes = [];

    /**
     * @var array<string, RelationshipInterface[]>
     */
    private array $relationships = [];

    /**
     * @var Cast[]
     */
    private array $casts = [];

    /**
     * @var GlobalScope[]
     */
    private array $globalScopes = [];

    /**
     * @var LocalScope[]
     */
    private array $localScopes = [];

    public function __construct(private readonly string $name)
    {
        $this->normalizeNamespace($name);
    }

    public function name(): string
    {
        return $this->basename($this->name);
    }

    public function nameWithSuffixForFactory(): string
    {
        return Str::suffix($this->name(), 'Factory');
    }

    public function nameWithSuffixForTest(): string
    {
        return Str::suffix($this->name(), 'Test');
    }

    public function tableName(): string
    {
        return Str::snake(Str::pluralStudly($this->name));
    }

    /**
     * @return Column[]
     */
    public function columns(): array
    {
        return $this->columns;
    }

    public function column(string $name): Column
    {
        return $this->columns[$name];
    }

    public function addColumn(Column $column): void
    {
        $this->columns[$column->name()] = $column;
    }

    /**
     * @return Index[]
     */
    public function indexes(): array
    {
        return $this->indexes;
    }

    public function addIndex(Index $index): void
    {
        $this->indexes[] = $index;
    }

    /**
     * @return array<string, RelationshipInterface[]>
     */
    public function relationships(): array
    {
        return $this->relationships;
    }

    public function addRelationship(RelationshipInterface $relationship): void
    {
        $type = $relationship->identifier();

        if (!isset($this->relationships[$type])) {
            $this->relationships[$type] = [];
        }

        $this->relationships[$type][] = $relationship;
    }

    /**
     * @return BelongsToMany[]
     */
    public function belongsToMany(): array
    {
        return $this->relationships['belongsToMany'] ?? [];
    }

    /**
     * @return MorphedByMany[]
     */
    public function morphedByMany(): array
    {
        return $this->relationships['morphedByMany'] ?? [];
    }

    /**
     * @return Cast[]
     */
    public function casts(): array
    {
        return $this->casts;
    }

    public function addCast(Cast $cast): void
    {
        $this->casts[] = $cast;
    }

    /**
     * @return GlobalScope[]
     */
    public function globalScopes(): array
    {
        return $this->globalScopes;
    }

    public function addGlobalScope(GlobalScope $globalScope): void
    {
        $this->globalScopes[] = $globalScope;
    }

    /**
     * @return LocalScope[]
     */
    public function localScopes(): array
    {
        return $this->localScopes;
    }

    public function addLocalScope(LocalScope $localScope): void
    {
        $this->localScopes[] = $localScope;
    }
}
