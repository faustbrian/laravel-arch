<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Migration;
use BaseCodeOy\Arch\Model\Model;
use BaseCodeOy\Arch\Model\Model\Relationship\BelongsToMany;
use BaseCodeOy\Arch\Model\Model\Relationship\MorphedByMany;
use Carbon\Carbon;
use Illuminate\Support\Str;

final class MigrationGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        $tables = [
            'tableNames' => [],
            'pivotTableNames' => [],
            'polymorphicManyToManyTables' => [],
        ];

        /**
         * @var \BaseCodeOy\Arch\Model\Migration
         */
        foreach (Tree::get('migrations') as $migration) {
            if (\count($migration->columns()) > 0) {
                $tables['tableNames'][$migration->name()] = $this->renderClass($migration, 'laravel/migration/create', [
                    'table' => $migration->name(),
                    'body' => $this->buildColumns($migration),
                ]);
            }
        }

        /**
         * @var \BaseCodeOy\Arch\Model\Model
         */
        foreach (Tree::get('models') as $model) {
            foreach ($model->belongsToMany() as $belongsToMany) {
                $tables['pivotTableNames'][$belongsToMany->tableName($model)] = $this->renderClass($model, 'laravel/migration/create', [
                    'class' => $model->name(),
                    'table' => $belongsToMany->tableName($model),
                    'body' => $this->buildBelongsToManyColumns($model, $belongsToMany),
                ]);
            }

            foreach ($model->morphedByMany() as $morphedByMany) {
                $tables['polymorphicManyToManyTables'][$morphedByMany->tableName()] = $this->renderClass($model, 'laravel/migration/create', [
                    'class' => $model->name(),
                    'table' => $morphedByMany->tableName(),
                    'body' => $this->buildMorphedByManyColumns($morphedByMany),
                ]);
            }
        }

        $this->createMigrations($tables);

        $this->persist();
    }

    private function buildColumns(Migration $migration): string
    {
        $columns = [];

        foreach ($migration->columns() as $column) {
            $segments = [];

            if (\in_array($column->type(), ['id', 'rememberToken', 'timestamps'], true)) {
                $segments[] = \sprintf('%s()', $column->type());
            } else {
                $segments[] = \sprintf(
                    '%s(\'%s\'%s)',
                    $column->type(),
                    $column->name(),
                    \count($column->attributes()) > 0 ? ', '.\implode(', ', $column->attributes()) : '',
                );
            }

            foreach ($column->modifiers() as $modifier) {
                $segments[] = \sprintf('%s()', $modifier);
            }

            $columns[] = \sprintf('$table->%s;', \implode('->', $segments));
        }

        return Str::indent(\implode(\PHP_EOL, $columns), 12);
    }

    private function buildBelongsToManyColumns(Model $model, BelongsToMany $relationship): string
    {
        $columns = [];

        foreach ($relationship->models($model) as $segment) {
            $columns[] = \sprintf(
                '$table->unsignedBigInteger(\'%s_id\');',
                Str::snake($segment),
            );

            $columns[] = \sprintf(
                '$table->foreignId(\'%s_id\')->constrained()->references(\'id\')->on(\'%s\')->cascadeOnUpdate()->cascadeOnDelete();',
                Str::snake($segment),
                Str::snake(Str::plural($segment)),
            );
        }

        return Str::indent(\implode(\PHP_EOL, $columns), 12);
    }

    private function buildMorphedByManyColumns(MorphedByMany $relationship): string
    {
        $columns = [];

        $columns[] = \sprintf(
            '$table->unsignedBigInteger(\'%s_id\');',
            Str::snake($relationship->related()),
        );

        $columns[] = \sprintf(
            '$table->morphs(\'%s\');',
            Str::lower(Str::singular($relationship->related()).'able'),
        );

        return Str::indent(\implode(\PHP_EOL, $columns), 12);
    }

    private function createMigrations(array $tables): void
    {
        $tables = collect($tables['tableNames'])
            ->merge($tables['pivotTableNames'])
            ->merge($tables['polymorphicManyToManyTables']);

        $sequentialTimestamp = Carbon::now()->copy()->subSeconds($tables->count());

        $tables->each(
            fn ($data, $tableName) => $this->createFile(
                \sprintf(
                    '%s_create_%s_table',
                    $sequentialTimestamp->addSecond()->format('Y_m_d_His'),
                    $tableName,
                ),
                $data,
            ),
        );
    }
}
