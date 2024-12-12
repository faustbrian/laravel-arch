<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Model;

use Illuminate\Support\Str;

final class Controller extends AbstractData
{
    /** @var array<ControllerMethod> */
    private array $methods = [];

    public function __construct(
        private readonly bool $authorizeResource,
        private readonly string $name,
        private readonly string $group,
        private readonly string $model,
        private readonly ?string $parent = null,
        private readonly bool $creatable = false,
        private readonly bool $invokable = false,
        private readonly bool $plain = false,
        private readonly bool $resource = false,
        private readonly bool $singleton = false,
    ) {}

    #[\Override()]
    public function name(): string
    {
        return Str::of($this->basename($this->name))
            ->singular()
            ->studly()
            ->toString();
    }

    public function nameWithSuffix(): string
    {
        return Str::suffix($this->name(), 'Controller');
    }

    public function nameWithSuffixForTest(): string
    {
        return Str::suffix($this->nameWithSuffix(), 'Test');
    }

    public function nameWithSuffixForFormRequest(): string
    {
        if ($this->isNested()) {
            return Str::suffix($this->model, 'Request');
        }

        return Str::suffix($this->name(), 'Request');
    }

    public function nameWithSuffixForRoute(): string
    {
        return Str::plural(Str::kebab($this->name));
    }

    public function group(): string
    {
        return $this->group;
    }

    public function api(): bool
    {
        return $this->group === 'api';
    }

    public function web(): bool
    {
        return $this->group === 'web';
    }

    public function addMethod(ControllerMethod $controllerMethod): void
    {
        $this->methods[] = $controllerMethod;
    }

    /**
     * @return array<ControllerMethod>
     */
    public function methods(): array
    {
        return $this->methods;
    }

    public function parentModel(): string
    {
        if ($this->isNested()) {
            return $this->parent;
        }

        return $this->model;
    }

    public function nestedModel(): string
    {
        return $this->model;
    }

    public function isNested(): bool
    {
        return $this->parent !== null;
    }

    public function creatable(): bool
    {
        return $this->creatable;
    }

    public function invokable(): bool
    {
        return $this->invokable;
    }

    public function plain(): bool
    {
        return $this->plain;
    }

    public function resource(): bool
    {
        return $this->resource;
    }

    public function singleton(): bool
    {
        return $this->singleton;
    }

    public function isApiResource(): bool
    {
        return $this->group === 'api';
    }

    public function shouldIncludeModel(): bool
    {
        if ($this->invokable) {
            return false;
        }

        if ($this->group === 'api') {
            return true;
        }

        if ($this->resource) {
            return true;
        }

        return $this->isNested();
    }

    public function authorizeResource(): bool
    {
        return $this->authorizeResource;
    }

    public function shouldRenderMethods(): bool
    {
        if ($this->invokable) {
            return false;
        }

        return !$this->plain;
    }
}
