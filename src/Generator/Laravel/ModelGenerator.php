<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Column;
use BaseCodeOy\Arch\Model\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final class ModelGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Model
         */
        foreach (Tree::get('models') as $model) {
            $this->addImport($model, 'Illuminate\Database\Eloquent\Factories\HasFactory');
            $this->addImport($model, 'Illuminate\Database\Eloquent\Model');

            $body = \array_filter([
                $this->buildGlobalScopes($model),
                $this->buildFillable($model),
                $this->buildCasts($model),
                ...$this->buildRelationships($model),
                $this->buildLocalScopes($model),
            ]);

            $this->createFile(
                $model->name(),
                $this->renderClass($model, 'laravel/model/model', [
                    'class' => $model->name(),
                    'body' => \PHP_EOL.\trim(\implode(\PHP_EOL, $body), "\r\n"),
                ]),
            );
        }

        $this->persist();
    }

    private function buildGlobalScopes(Model $model): string
    {
        $globalScopes = [];

        foreach ($model->globalScopes() as $globalScope) {
            $globalScopes[] = \trim(
                $this->renderFile(
                    $model,
                    'laravel/model/scope/global',
                    ['name' => $globalScope->nameForBooted()],
                ),
            );
        }

        if (empty($globalScopes)) {
            return \PHP_EOL;
        }

        return \trim(
            $this->renderFile(
                $model,
                'laravel/model/booted',
                ['body' => \implode(\PHP_EOL, $globalScopes)],
            ),
        );
    }

    private function buildLocalScopes(Model $model): string
    {
        $localScopes = [];

        foreach ($model->localScopes() as $localScope) {
            $localScopes[] = $this->renderFile(
                $model,
                'laravel/model/scope/local',
                ['name' => $localScope->name()],
            );
        }

        if (empty($localScopes)) {
            return \PHP_EOL;
        }

        return \implode(\PHP_EOL, $localScopes);
    }

    private function buildFillable(Model $model): string
    {
        return $this->renderFile(
            $model,
            'laravel/model/fillable',
            ['attributes' => collect($model->columns())->map(fn (Column $column): string => $column->name())->implode("' ,'")],
        );
    }

    private function buildCasts(Model $model): string
    {
        if (empty($model->casts())) {
            return '';
        }

        return $this->renderFile(
            $model,
            'laravel/model/casts',
            ['attributes' => Arr::propertiesToArray($model->casts())],
        );
    }

    private function buildRelationships(Model $model): array
    {
        $result = [];

        foreach ($model->relationships() as $type => $relationships) {
            foreach ($relationships as $relationship) {
                $this->addImport($model, $relationship->import());

                $result[] = $this->renderFile(
                    $model,
                    'laravel/model/relationship/'.Str::kebab($type),
                    [
                        'relationship' => $relationship->relationship(),
                        ...$relationship->toArray(),
                    ],
                );
            }
        }

        return $result;
    }
}
