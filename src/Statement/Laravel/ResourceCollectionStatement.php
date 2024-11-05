<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Exception\WrongStatementHandlerException;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Model\ResourceCollection;
use Illuminate\Support\Str;

final readonly class ResourceCollectionStatement implements StatementInterface
{
    public function __construct(
        private string $name,
        private string $reference,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        if (empty($statement[1])) {
            throw new WrongStatementHandlerException();
        }

        Tree::add('resourceCollections', new ResourceCollection(name: $statement[0]));

        return new self($statement[0], $statement[0]);
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            'return new %sCollection($%s);',
            Str::studly($this->name),
            Str::camel($this->reference),
        );
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
}
