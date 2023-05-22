<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Laravel;

use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;
use BombenProdukt\Arch\Model\Controller;
use BombenProdukt\Arch\Renderer\FileRenderer;
use Illuminate\Support\Str;

final class ControllerGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Controller
         */
        foreach (Tree::get('controllers') as $controller) {
            $this->addImport($controller, 'App\Http\Controllers\Controller');

            $controllerMethods = [];

            if ($controller->authorizeResource()) {
                $controller->setMetadata('constructor.statements', [
                    FileRenderer::render(
                        'laravel/controller/authorize/authorizeResource',
                        ['model' => $controller->nestedModel()],
                    ),
                ]);
            }

            if ($controller->shouldRenderMethods()) {
                foreach ($controller->methods() as $method) {
                    $controllerMethods[$method->name()] = [];

                    foreach ($method->statements() as $statement) {
                        foreach ($statement->imports() as $import) {
                            $this->addImport($controller, $import);
                        }

                        foreach ($statement->traits() as $trait) {
                            $this->addTrait($controller, $trait);
                        }

                        $controllerMethods[$method->name()][] = $statement->code([
                            'reference' => $controller->nestedModel(),
                        ]);
                    }

                    $methodVariables = [
                        'body' => Str::indent(
                            \count($controllerMethods[$method->name()]) > 0
                                ? \implode(\PHP_EOL.\PHP_EOL, $controllerMethods[$method->name()])
                                : '//',
                            8,
                        ),
                    ];

                    if ($controller->shouldIncludeModel()) {
                        $this->addImport($controller, Str::modelNamespace($controller->parentModel()));

                        $methodVariables['model'] = $controller->parentModel();
                        $methodVariables['modelVariable'] = Str::camel($controller->parentModel());
                    }

                    if ($controller->isNested()) {
                        $this->addImport($controller, Str::modelNamespace($controller->parentModel()));
                        $this->addImport($controller, Str::modelNamespace($controller->nestedModel()));

                        $methodVariables['parentModel'] = $controller->parentModel();
                        $methodVariables['parentModelVariable'] = Str::camel($controller->parentModel());
                        $methodVariables['model'] = $controller->nestedModel();
                        $methodVariables['modelVariable'] = Str::camel($controller->nestedModel());
                    }

                    if (\in_array($method->name(), ['store', 'update'], true)) {
                        $className = Str::studly($method->name()).$controller->nameWithSuffixForFormRequest();

                        $this->addImport($controller, Str::formRequestNamespace($className));

                        $methodVariables['request'] = $className;
                    }

                    $controllerMethods[$method->name()] = $this->renderFile(
                        $controller,
                        $this->stubMethod($controller).'/methods/'.$method->name(),
                        $methodVariables,
                    );
                }
            }

            $this->createFile(
                $controller->nameWithSuffix(),
                $this->renderClass($controller, $this->stubClass($controller), [
                    'class' => $controller->nameWithSuffix(),
                    'body' => \trim(\implode(\PHP_EOL, $controllerMethods)) ?: '//',
                ]),
            );
        }

        $this->persist();
    }

    private function stubMethod(Controller $controller): string
    {
        $prefix = \sprintf('laravel/controller/%s', $controller->group());

        if ($controller->plain()) {
            return $prefix.'/plain';
        }

        if ($controller->invokable()) {
            return $prefix.'/invokable';
        }

        if ($controller->isNested()) {
            if ($controller->singleton()) {
                return $prefix.'/nested/singleton';
            }

            return $prefix.'/nested';
        }

        if ($controller->singleton()) {
            return $prefix.'/singleton';
        }

        if ($controller->resource()) {
            return $prefix.'/resource';
        }

        return $prefix.'/controller';
    }

    private function stubClass(Controller $controller): string
    {
        if ($controller->invokable()) {
            return 'laravel/controller/invokable';
        }

        return 'laravel/controller/plain';
    }
}
