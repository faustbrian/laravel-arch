<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

final readonly class QueryStatement implements StatementInterface
{
    public function __construct(
        private string $operation,
        private array $clauses = [],
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);
        $statementMethod = Arr::get($statement, 0);

        if (\in_array($statementMethod, ['all', 'paginate', 'simplePaginate', 'count', 'exists'], true)) {
            return new self($statementMethod);
        }

        if (Arr::get($statement, 'pluck')) {
            return new self('pluck', $statement);
        }

        return new self('get', $statement);
    }

    public function code(array $context = []): string
    {
        $model = $this->getModelClass($context);

        if (\in_array($this->operation, ['all', 'paginate', 'simplePaginate', 'count', 'exists'], true)) {
            return \sprintf(
                '$%s = %s::%s();',
                Str::camel(Str::plural($model)),
                $model,
                $this->operation,
            );
        }

        $methods = [];

        foreach ($this->clauses as $method => $arguments) {
            foreach ($arguments as $argument) {
                if (\in_array($method, ['where', 'order', 'pluck'], true)) {
                    $column = $this->columnName($model, $argument);
                }

                if ($method === 'where') {
                    $methods[] = $method.'('."'{$column}', $".\str_replace('.', '->', $argument).')';
                } elseif ($method === 'pluck') {
                    $pluck_field = $argument;
                    $methods[] = "pluck('{$column}')";
                } elseif ($method === 'order') {
                    $methods[] = "orderBy('{$column}')";
                } else {
                    $methods[] = $method.'('.$argument.')';
                }
            }
        }

        $variableName = match ($this->operation) {
            'pluck' => $this->pluckName($pluck_field, $context),
            'count' => Str::camel($model).'_count',
            default => Str::camel(Str::plural($model)),
        };

        $code = '$'.Str::camel($variableName).' = '.$model.'::';
        $code .= \implode('->', $methods);

        if (\in_array($this->operation, ['get', 'count'], true)) {
            $code .= '->'.$this->operation.'()';
        }

        return $code.';';
    }

    public function test(array $context = []): string
    {
        return '';
    }

    public function imports(array $context = []): array
    {
        return [];
    }

    public function traits(array $context = []): array
    {
        return [];
    }

    private function columnName(string $model, string $value): string
    {
        if (Str::contains($value, '.')) {
            $reference = Str::before($value, '.');

            if (\strcasecmp($model, $reference) === 0) {
                return Str::after($value, '.');
            }
        }

        return $value;
    }

    private function pluckName(string $field, array $context): string
    {
        if (Str::contains($field, '.')) {
            return Str::lower(Str::plural(\str_replace('.', '_', $field)));
        }

        return Str::lower($this->getModelClass($context).'_'.Str::plural($field));
    }

    private function getModelClass(array $context): string
    {
        return Str::studly($context['reference']);
    }
}
