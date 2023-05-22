<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator;

use BombenProdukt\Arch\Artisan\AbstractCommand;
use BombenProdukt\Arch\Contract\GeneratorInterface;
use BombenProdukt\Arch\Contract\ModelInterface;
use BombenProdukt\Arch\Facade\Environment;
use BombenProdukt\Arch\Model\GeneratorResult;
use BombenProdukt\Arch\Path;
use BombenProdukt\Arch\Renderer\ClassRenderer;
use BombenProdukt\Arch\Renderer\FileRenderer;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Spatie\Regex\Regex;

abstract class AbstractGenerator implements GeneratorInterface
{
    /**
     * @var array<string, array<string>>
     */
    private array $imports = [];

    /**
     * @var array<string, array<string>>
     */
    private array $extends = [];

    /**
     * @var array<string, array<string>>
     */
    private array $implements = [];

    /**
     * @var array<string, array<string>>
     */
    private array $traits = [];

    /**
     * @var array<string, array<string>>
     */
    private array $output = [];

    public function result(): GeneratorResult
    {
        return new GeneratorResult(...$this->output);
    }

    abstract public function generate(): void;

    protected function addImport(ModelInterface $model, string $reference): void
    {
        $this->imports[$model->name()][] = $reference;
    }

    protected function addFunctionImport(ModelInterface $model, string $reference): void
    {
        $this->imports[$model->name()][] = "function {$reference}";
    }

    protected function addExtends(ModelInterface $model, string $reference): void
    {
        $this->extends[$model->name()][] = $reference;
    }

    protected function addInterface(ModelInterface $model, string $reference): void
    {
        $this->implements[$model->name()][] = $reference;
    }

    protected function addTrait(ModelInterface $model, string $reference): void
    {
        $this->traits[$model->name()][] = $reference;
    }

    protected function getPath(ModelInterface $model): string
    {
        return \sprintf(
            '%s/%s.php',
            Path::app(),
            \str_replace('\\', '/', Str::relativeNamespace($model->fullyQualifiedClassName())),
        );
    }

    protected function createFileFromCommand(AbstractCommand $command): void
    {
        $path = Regex::matchAll('/\[(.*)\]/', $command->handle())->results()[0]->group(1);

        $this->output['created'][$path] = null;
    }

    protected function createFile(string $name, string $content, ?string $type = null): void
    {
        $path = \sprintf(
            '%s/%s.php',
            Environment::generators()->findByAccessor($type ?? $this->accessor())->directory(),
            $name,
        );

        if (File::exists($path)) {
            return;
        }

        $this->output['created'][$path] = $content;
    }

    protected function renderClass(ModelInterface $model, string $stub, array $data = []): string
    {
        return ClassRenderer::render($stub, $this->getStubData($model, $data));
    }

    protected function renderFile(ModelInterface $model, string $stub, array $data = []): string
    {
        return FileRenderer::render($stub, $this->getStubData($model, $data));
    }

    protected function persist(): void
    {
        $result = $this->result();

        foreach ($result->created() as $path => $content) {
            $this->createFileOnDisk($path, $content);
        }

        foreach ($result->updated() as $path => $content) {
            $this->updateFileOnDisk($path, $content);
        }

        foreach ($result->deleted() as $path) {
            $this->deleteFileOnDisk($path);
        }
    }

     protected function accessor(): string
     {
         return Str::of(class_basename(static::class))
             ->beforeLast('Generator')
             ->camel()
             ->plural()
             ->toString();
     }

    private function createFileOnDisk(string $path, string $content): void
    {
        if (File::exists($path)) {
            throw new \RuntimeException("File {$path} already exists");
        }

        File::ensureDirectoryExists(\dirname($path), 0o755, true);

        File::put($path, $content);
    }

    private function updateFileOnDisk(string $path, string $content): void
    {
        if (File::missing($path)) {
            throw new \RuntimeException("File {$path} does not exist");
        }

        File::put($path, $content);
    }

    private function deleteFileOnDisk(string $path): void
    {
        if (File::missing($path)) {
            throw new \RuntimeException("File {$path} does not exist");
        }

        File::delete($path);
    }

    private function populateConstructor(ModelInterface $model): string
    {
        if ($model->missingMetadata('constructor')) {
            return '';
        }

        return FileRenderer::render(
            'constructor',
            [
                'type' => Str::of(Str::className($model::class))->headline()->lower()->toString(),
                'properties' => Arr::propertiesToConstructor($model->getMetadata('constructor.properties', [])),
                'body' => \implode(\PHP_EOL, $model->getMetadata('constructor.statements', [])),
            ],
        );
    }

    private function populateImports(ModelInterface $model): string
    {
        return collect($this->imports[$model->name()] ?? [])
            ->map(fn ($class) => "use {$class};")
            ->unique()
            ->sort()
            ->implode(\PHP_EOL);
    }

    private function populateExtends(ModelInterface $model): ?string
    {
        if (empty($this->extends[$model->name()])) {
            return null;
        }

        return 'extends '.collect($this->extends[$model->name()] ?? [])
            ->map(fn ($class) => $class)
            ->unique()
            ->sort()
            ->implode(', ');
    }

    private function populateImplements(ModelInterface $model): ?string
    {
        if (empty($this->implements[$model->name()])) {
            return null;
        }

        return 'implements '.collect($this->implements[$model->name()] ?? [])
            ->map(fn ($class) => $class)
            ->unique()
            ->sort()
            ->implode(', ');
    }

    private function populateTraits(ModelInterface $model): string
    {
        return collect($this->traits[$model->name()] ?? [])
            ->map(fn ($class) => "use {$class};")
            ->unique()
            ->sort()
            ->implode(\PHP_EOL);
    }

    private function getStubData(ModelInterface $model, array $data): array
    {
        return [
            ...$data,
            'namespace' => Environment::generators()->findByAccessor($this->accessor())->namespace(),
            'constructor' => $this->populateConstructor($model),
            'extends' => $this->populateExtends($model),
            'implements' => $this->populateImplements($model),
            'imports' => $this->populateImports($model),
            'traits' => $this->populateTraits($model),
        ];
    }
}
