<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

final class FactoryGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Factory
         */
        foreach (Tree::get('factories') as $factory) {
            $this->addImport($factory, Factory::class);

            $model = collect(Tree::get('models'))->firstWhere(fn (Model $model) => $model->name() === $factory->name());

            $this->createFile(
                $factory->nameWithSuffix(),
                $this->renderClass($factory, 'laravel/factory/factory', [
                    'class' => $factory->nameWithSuffix(),
                    'namespacedModel' => Str::modelNamespace($factory->name()),
                    'body' => $this->buildColumns($model),
                ]),
            );
        }

        $this->persist();
    }

    private function buildColumns(Model $model): string
    {
        $columns = [];

        foreach ($model->columns() as $column) {
            if (\in_array($column->type(), ['id', 'timestamps'], true)) {
                continue;
            }

            if (\in_array($column->name(), ['id', 'softDeletes', 'softDeletesTz'], true)) {
                continue;
            }

            if (Str::startsWith($column->type(), 'nullable')) {
                continue;
            }

            $foreign = $column->foreignKey();

            $columnKey = $column->name();
            $columnValue = null;

            if ($foreign) {
                $table = Str::beforeLast($column->name(), '_id');
                $key = 'id';

                if ($foreign !== 'foreign') {
                    $table = $foreign;

                    $key = match (true) {
                        Str::startsWith($column->name(), $foreign.'_') => Str::after($column->name(), $foreign.'_'),
                        Str::startsWith($column->name(), Str::snake(Str::singular($foreign)).'_') => Str::after($column->name(), Str::snake(Str::singular($foreign)).'_'),
                        !Str::endsWith($column->name(), '_id') => $column->name(),
                    };
                }

                $class = Str::studly(Str::singular($table));

                $this->addImport($model, Str::modelNamespace($class));

                $columnValue = $key === 'id'
                    ? \sprintf('%s::factory()', $class)
                    : \sprintf('%s::factory()->create()->%s', $class, $key);
            }

            if ($column->type() === 'id' || ($column->type() === 'uuid' && Str::endsWith($column->name(), '_id'))) {
                $name = Str::beforeLast($column->name(), '_id');
                $class = Str::studly($column->attributes()[0] ?? $name);

                $this->addImport($model, Str::modelNamespace($class));

                $columnValue .= \sprintf('%s::factory()', $class);
            }

            if (\in_array($column->type(), ['enum', 'set'], true) && !empty($column->attributes())) {
                $faker = FakerRegistry::data($column->name()) ?? FakerRegistry::dataType($column->type());

                $columnValue = \str_replace(
                    "/** {$column->type()}_attributes **/",
                    \json_encode($column->attributes()),
                    $this->prependFaker($faker),
                );
            }

            if (\in_array($column->type(), ['decimal', 'double', 'float'], true)) {
                $faker = FakerRegistry::data($column->name()) ?? FakerRegistry::dataType($column->type());
                $columnValue .= $this->prependFaker($faker);

                $precision = \min([65, (int) ($column->attributes()[0] ?? 10)]);
                $scale = \min([30, \max([0, (int) ($column->attributes()[1] ?? 0)])]);

                $columnValue = \str_replace(
                    "/** {$column->type()}_attributes **/",
                    \implode(', ', [$scale, 0, \str_repeat('9', $precision - $scale).'.'.\str_repeat('9', $scale)]),
                    $columnValue,
                );
            }

            if (\in_array($column->type(), ['json', 'jsonb'], true)) {
                $columnValue = $column->defaultValue() ?? '{}';
            }

            if ($column->type() === 'morphs') {
                $columnModel = Str::studly($column->name());

                $columns[] = Str::toArrayItem("{$column->name()}_id", \sprintf('%s::factory()', $columnModel));
                $columns[] = Str::toArrayItem("{$column->name()}_type", \sprintf('%s::class', $columnModel));

                continue;
            }

            if ($column->type() === 'rememberToken') {
                $this->addImport($model, Str::class);

                $columnValue = 'Str::random(10)';
            }

            if (empty($columnValue)) {
                $type = $column->type();

                $faker = FakerRegistry::data($column->name()) ?? (FakerRegistry::dataType($type) ?? FakerRegistry::dataType($column->type()));

                if ($faker === null) {
                    $faker = 'word';
                }

                if ($faker === 'word' && !empty($column->attributes())) {
                    $faker = \sprintf("regexify('[A-Za-z0-9]{%s}')", \current($column->attributes()));
                }

                $columnValue = $this->prependFaker($faker);
            }

            if ($columnKey && $columnValue) {
                $columns[] = Str::toArrayItem($columnKey, $columnValue);
            }
        }

        if (empty($columns)) {
            $columns[] = '//';
        }

        return Str::indent(\implode(\PHP_EOL, $columns), 12);
    }

    private function prependFaker(string $call): string
    {
        return \sprintf('fake()->%s', $call);
    }
}
