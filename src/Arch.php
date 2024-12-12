<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch;

use BaseCodeOy\Arch\Contract\GeneratorInterface;
use BaseCodeOy\Arch\Contract\TokenizerInterface;
use BaseCodeOy\Arch\Facade\Environment;
use BaseCodeOy\Arch\Facade\Parser;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Model\GeneratorResult;
use BaseCodeOy\Arch\Model\Manifest;
use Illuminate\Support\Facades\App;

final readonly class Arch
{
    public static function parse(string $path): void
    {
        self::tokenize(Parser::parse($path));
    }

    public static function tokenize(Manifest $manifest): void
    {
        Tree::flush();

        foreach (Environment::tokenizers()->all() as $tokenizer) {
            /** @var TokenizerInterface */
            $tokenizer = App::make($tokenizer->fullyQualifiedClassName(), [
                'configuration' => $tokenizer->configuration(),
            ]);

            Tree::merge(
                tokens: $tokenizer->tokenize($manifest->definitions()),
                replaceOnConflict: true,
            );
        }
    }

    public static function generate(): GeneratorResult
    {
        $components = [];

        foreach (Environment::generators()->all() as $generator) {
            /** @var GeneratorInterface */
            $generator = App::make($generator->fullyQualifiedClassName());

            App::call($generator->generate(...));

            $components = \array_merge_recursive($components, $generator->result()->toArray());
        }

        return new GeneratorResult(...$components);
    }
}
