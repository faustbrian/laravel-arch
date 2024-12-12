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

final readonly class DispatchStatement implements StatementInterface
{
    public function __construct(
        private string $job,
        private string $method = 'dispatch',
        private array $parameters = [],
        private ?string $onQueue = null,
        private ?string $onConnection = null,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        Tree::add('events', new Event(name: $statement[0]));

        return new self(
            job: $statement[0],
            method: $context['method'],
            parameters: Arr::mapValueToProperty($statement['with'] ?? []),
            onQueue: Arr::get($statement, 'onQueue'),
            onConnection: Arr::get($statement, 'onConnection'),
        );
    }

    #[\Override()]
    public function code(array $context = []): string
    {
        return \sprintf(
            '%s::%s(%s%s)%s%s;',
            $this->job,
            $this->method,
            \in_array($this->method, ['dispatchIf', 'dispatchUnless'], true) ? '$condition' : '',
            $this->parameters !== [] ? Arr::propertiesToVariableList($this->parameters) : '',
            $this->onConnection(),
            $this->onQueue(),
        );
    }

    #[\Override()]
    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/event/test/event', [
            'class' => $this->job,
        ]);
    }

    #[\Override()]
    public function imports(array $context = []): array
    {
        return [];
    }

    #[\Override()]
    public function traits(array $context = []): array
    {
        return [];
    }

    private function onQueue(): string
    {
        if ($this->onQueue === null || $this->onQueue === '' || $this->onQueue === '0') {
            return '';
        }

        return \sprintf('->onQueue(%s)', $this->onQueue);
    }

    private function onConnection(): string
    {
        if ($this->onConnection === null || $this->onConnection === '' || $this->onConnection === '0') {
            return '';
        }

        return \sprintf('->onConnection(%s)', $this->onConnection);
    }
}
