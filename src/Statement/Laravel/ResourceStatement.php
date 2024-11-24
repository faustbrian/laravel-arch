<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Statement\Laravel;

use BaseCodeOy\Arch\Contract\StatementInterface;
use BaseCodeOy\Arch\Exception\WrongStatementHandlerException;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Model\Resource;
use Illuminate\Support\Str;

final readonly class ResourceStatement implements StatementInterface
{
    public function __construct(
        private string $name,
        private string $reference,
    ) {}

    public static function from(array $context): StatementInterface
    {
        $statement = Str::parseStatement($context['statement']);

        if (\array_key_exists(1, $statement)) {
            throw new WrongStatementHandlerException();
        }

        Tree::add('resources', new Resource(name: $statement[0]));

        return new self($statement[0], $statement[0]);
    }

    public function code(array $context = []): string
    {
        return \sprintf(
            'return new %sResource($%s);',
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
