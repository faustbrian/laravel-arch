<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use Illuminate\Support\Str;

final class ControllerTestGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Controller
         */
        foreach (Tree::get('controllers') as $controller) {
            $controllerMethods = [];

            if ($controller->invokable() === false) {
                foreach ($controller->methods() as $method) {
                    $controllerMethods[$method->name()] = [];

                    foreach ($method->statements() as $statement) {
                        foreach ($statement->imports() as $import) {
                            $this->addTrait($controller, $import);
                        }

                        $controllerMethods[$method->name()][] = $statement->test();
                    }

                    $controllerMethods[$method->name()] = $this->renderFile(
                        $controller,
                        'laravel/controller/test/method',
                        [
                            'title' => $method->name(),
                            'body' => Str::indent(
                                \count($controllerMethods[$method->name()]) > 0
                                    ? \implode(\PHP_EOL.\PHP_EOL, $controllerMethods[$method->name()])
                                    : '//',
                                8,
                            ),
                        ],
                    );
                }
            }

            $this->createFile(
                $controller->nameWithSuffixForTest(),
                $this->renderClass($controller, 'laravel/controller/test/test', [
                    'body' => \trim(\implode(\PHP_EOL, $controllerMethods)) ?: '//',
                ]),
            );
        }

        $this->persist();
    }
}
