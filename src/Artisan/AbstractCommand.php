<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Artisan;

use Illuminate\Support\Facades\Artisan;

abstract class AbstractCommand
{
    /**
     * @var array<string, string>
     */
    protected array $arguments = [];

    /**
     * @var array<int, string>
     */
    protected array $options = [];

    public function name(string $name): static
    {
        $this->argument('name', $name);

        return $this;
    }

    public function force(): static
    {
        $this->option('force');

        return $this;
    }

    public function handle(): string
    {
        Artisan::call(
            $this->signature(),
            [
                ...$this->arguments,
                ...$this->options,
            ],
        );

        return \trim(Artisan::output());
    }

    protected function argument(string $key, string $value): void
    {
        $this->arguments[$key] = $value;
    }

    protected function option(string $key, ?string $value = null): void
    {
        $this->options["--{$key}"] = $value;
    }

    abstract protected function signature(): string;
}
