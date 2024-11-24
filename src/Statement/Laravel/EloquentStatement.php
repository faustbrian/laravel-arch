<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use Illuminate\Support\Str;

final readonly class EloquentStatement implements StatementInterface
{
    public function __construct(
        private string $operation,
        private ?string $reference = null,
        private array $columns = [],
    ) {}

    public static function from(array $context): StatementInterface
    {
        if ($context['method'] === 'update') {
            return new self(
                operation: 'update',
                columns: \explode(',', $context['statement']),
            );
        }

        return new self($context['method'], $context['statement']);
    }

    public function code(array $context = []): string
    {
        return match ($this->operation) {
            'save' => $this->handleSave($context),
            'create' => $this->handleCreate($context),
            'update' => $this->handleUpdate($context),
            'find' => $this->handleFind($context),
            'delete' => $this->handleDelete($context),
            'destroy' => $this->handleDestroy($context),
            default => throw new \InvalidArgumentException(\sprintf('Unknown operation: %s', $this->operation)),
        };
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

    private function handleSave(array $context): string
    {
        return \sprintf(
            '$%s->save();',
            $this->getModelVariable($context),
        );
    }

    private function handleCreate(array $context): string
    {
        return \sprintf(
            '$%s = %s::create($request->validated());',
            $this->getModelVariable($context),
            $this->getModelClass($context),
        );
    }

    private function handleUpdate(array $context): string
    {
        if (\count($this->columns) > 0) {
            return \sprintf(
                '$%s->update([%s]);',
                $this->getModelVariable($context),
                \implode(',', \array_map(fn ($column) => \sprintf("'%s' => \$%s", \trim($column), \trim($column)), $this->columns)),
            );
        }

        return \sprintf(
            '$%s->update($request->validated());',
            $this->getModelVariable($context),
        );
    }

    private function handleFind(array $context): string
    {
        return \sprintf(
            '$%s = %s::find($%s);',
            $this->getModelVariable($context),
            $this->getModelClass($context),
            $this->getModelVariable($context),
        );
    }

    private function handleDelete(array $context): string
    {
        return \sprintf(
            '$%s->delete();',
            $this->getModelVariable($context),
        );
    }

    private function handleDestroy(array $context): string
    {
        return \sprintf(
            '%s::destroy($%s);',
            $this->getModelClass($context),
            $this->reference,
        );
    }

    private function getModelClass(array $context): string
    {
        return Str::studly($this->reference ?? $context['reference']);
    }

    private function getModelVariable(array $context): string
    {
        return Str::camel($this->reference ?? $context['reference']);
    }
}
