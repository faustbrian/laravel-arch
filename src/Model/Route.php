<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Model;

final class Route extends AbstractData
{
    public function __construct(
        private readonly string $type,
        private readonly string $verb,
        private readonly string $uri,
        private readonly string $action,
        private readonly array $methods,
    ) {}

    public function name(): string
    {
        return \sprintf('%s/%s/%s', $this->type, $this->verb, $this->uri);
    }

    public function type(): string
    {
        return $this->type;
    }

    public function verb(): string
    {
        return $this->verb;
    }

    public function uri(): string
    {
        return $this->uri;
    }

    public function action(): string
    {
        return $this->action;
    }

    public function methods(): array
    {
        return $this->methods;
    }

    public function isApiResource(): bool
    {
        return $this->type === 'api' && $this->verb === 'resource';
    }
}
