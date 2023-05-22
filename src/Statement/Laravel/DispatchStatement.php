<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Statement\Laravel;

use BombenProdukt\Arch\Contract\StatementInterface;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Model\Event;
use BombenProdukt\Arch\Renderer\FileRenderer;
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

    public function code(array $context = []): string
    {
        return \sprintf(
            '%s::%s(%s%s)%s%s;',
            $this->job,
            $this->method,
            \in_array($this->method, ['dispatchIf', 'dispatchUnless'], true) ? '$condition' : '',
            $this->parameters ? Arr::propertiesToVariableList($this->parameters) : '',
            $this->onConnection(),
            $this->onQueue(),
        );
    }

    public function test(array $context = []): string
    {
        return FileRenderer::render('laravel/event/test/event', [
            'class' => $this->job,
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

    private function onQueue(): string
    {
        if (empty($this->onQueue)) {
            return '';
        }

        return \sprintf('->onQueue(%s)', $this->onQueue);
    }

    private function onConnection(): string
    {
        if (empty($this->onConnection)) {
            return '';
        }

        return \sprintf('->onConnection(%s)', $this->onConnection);
    }
}
