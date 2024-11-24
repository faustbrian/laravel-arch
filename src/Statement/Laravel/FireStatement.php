<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Model\Event;
use BaseCodeOy\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Spatie\Regex\Regex;

final readonly class FireStatement implements StatementInterface
{
    public function __construct(
        private string $name,
        private array $parameters = [],
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        Tree::add('events', new Event(name: $statement[0]));

        return new self(
            name: $statement[0],
            parameters: Arr::mapValueToProperty($statement['with'] ?? []),
        );
    }

    public function code(array $context = []): string
    {
        $hasParameters = \count($this->parameters) > 0;

        if ($this->isNamedEvent()) {
            $template = $hasParameters ? "event('%s', %s);" : "event('%s');";
        } else {
            $template = $hasParameters ? '%s::dispatch(%s);' : '%s::dispatch(%s);';
        }

        return \sprintf(
            $template,
            $this->name,
            $hasParameters ? Arr::propertiesToVariableList($this->parameters) : '',
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/event/test/event', [
            'class' => $this->name,
        ]);
    }

    public function imports(array $context = []): array
    {
        return [];
    }

    public function traits(array $context = []): array
    {
        return [];
    }

    private function isNamedEvent(): bool
    {
        return Regex::match('/^[a-z0-9.]+$/', $this->name)->hasMatch();
    }
}
