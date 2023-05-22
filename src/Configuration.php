<?php

declare(strict_types=1);

namespace BombenProdukt\Arch;

use BombenProdukt\Arch\Parser\YamlParser;
use BombenProdukt\Arch\Renderer\StubClassRenderer;
use BombenProdukt\Arch\Renderer\StubFileRenderer;
use BombenProdukt\Arch\Renderer\StubStringRenderer;
use BombenProdukt\Arch\Reporter\YamlReporter;
use BombenProdukt\Arch\Tree\ArrayTree;

final class Configuration
{
    public function __construct(
        private string $appNamespace,
        private string $appPath,
        private string $archPath,
        private string $stubPath,
        private string $classRenderer,
        private string $fileRenderer,
        private string $stringRenderer,
        private string $reporter,
        private string $parser,
        private string $tree,
        private array $extensions,
    ) {}

    public static function make(): self
    {
        return new self(
            appNamespace: 'App',
            appPath: 'app',
            archPath: base_path('.arch'),
            stubPath: \dirname(__DIR__).'/stubs',
            classRenderer: StubClassRenderer::class,
            fileRenderer: StubFileRenderer::class,
            stringRenderer: StubStringRenderer::class,
            reporter: YamlReporter::class,
            parser: YamlParser::class,
            tree: ArrayTree::class,
            extensions: [
                Extension\LaravelExtension::class => [
                    'generators' => [
                        [
                            'accessor' => 'casts',
                            'fullyQualifiedClassName' => Generator\Laravel\CastGenerator::class,
                            'namespace' => 'App\\Casts',
                            'directory' => 'app/Casts',
                        ],
                        [
                            'accessor' => 'castables',
                            'fullyQualifiedClassName' => Generator\Laravel\CastableGenerator::class,
                            'namespace' => 'App\\Castables',
                            'directory' => 'app/Castables',
                        ],
                        [
                            'accessor' => 'channels',
                            'fullyQualifiedClassName' => Generator\Laravel\ChannelGenerator::class,
                            'namespace' => 'App\\Channels',
                            'directory' => 'app/Channels',
                        ],
                        [
                            'accessor' => 'commands',
                            'fullyQualifiedClassName' => Generator\Laravel\CommandGenerator::class,
                            'namespace' => 'App\\Console\\Commands',
                            'directory' => 'app/Console/Commands',
                        ],
                        [
                            'accessor' => 'controllers',
                            'fullyQualifiedClassName' => Generator\Laravel\ControllerGenerator::class,
                            'namespace' => 'App\\Http\\Controllers',
                            'directory' => 'app/Http/Controllers',
                        ],
                        [
                            'accessor' => 'controllerTests',
                            'fullyQualifiedClassName' => Generator\Laravel\ControllerTestGenerator::class,
                            'namespace' => 'Tests\\Feature\\Http\\Controllers',
                            'directory' => 'tests/Feature/Http/Controllers',
                        ],
                        [
                            'accessor' => 'events',
                            'fullyQualifiedClassName' => Generator\Laravel\EventGenerator::class,
                            'namespace' => 'App\\Events',
                            'directory' => 'app/Events',
                        ],
                        [
                            'accessor' => 'factories',
                            'fullyQualifiedClassName' => Generator\Laravel\FactoryGenerator::class,
                            'namespace' => 'Database\\Factories',
                            'directory' => 'database/factories',
                        ],
                        [
                            'accessor' => 'formRequests',
                            'fullyQualifiedClassName' => Generator\Laravel\FormRequestGenerator::class,
                            'namespace' => 'App\\Http\\Requests',
                            'directory' => 'app/Http/Requests',
                        ],
                        [
                            'accessor' => 'globalScopes',
                            'fullyQualifiedClassName' => Generator\Laravel\GlobalScopeGenerator::class,
                            'namespace' => 'App\\Models\\Scopes',
                            'directory' => 'app/Models/Scopes',
                        ],
                        [
                            'accessor' => 'jobs',
                            'fullyQualifiedClassName' => Generator\Laravel\JobGenerator::class,
                            'namespace' => 'App\\Jobs',
                            'directory' => 'app/Jobs',
                        ],
                        [
                            'accessor' => 'mails',
                            'fullyQualifiedClassName' => Generator\Laravel\MailGenerator::class,
                            'namespace' => 'App\\Mail',
                            'directory' => 'app/Mail',
                        ],
                        [
                            'accessor' => 'middleware',
                            'fullyQualifiedClassName' => Generator\Laravel\MiddlewareGenerator::class,
                            'namespace' => 'App\\Http\\Middleware',
                            'directory' => 'app/Http/Middleware',
                        ],
                        [
                            'accessor' => 'migrations',
                            'fullyQualifiedClassName' => Generator\Laravel\MigrationGenerator::class,
                            'namespace' => 'Database\\Migrations',
                            'directory' => 'database/migrations',
                        ],
                        [
                            'accessor' => 'models',
                            'fullyQualifiedClassName' => Generator\Laravel\ModelGenerator::class,
                            'namespace' => 'App\\Models',
                            'directory' => 'app/Models',
                        ],
                        [
                            'accessor' => 'modelTests',
                            'fullyQualifiedClassName' => Generator\Laravel\ModelTestGenerator::class,
                            'namespace' => 'Tests\\Unit\\Models',
                            'directory' => 'tests/Unit/Models',
                        ],
                        [
                            'accessor' => 'notifications',
                            'fullyQualifiedClassName' => Generator\Laravel\NotificationGenerator::class,
                            'namespace' => 'App\\Notifications',
                            'directory' => 'app/Notifications',
                        ],
                        [
                            'accessor' => 'observers',
                            'fullyQualifiedClassName' => Generator\Laravel\ObserverGenerator::class,
                            'namespace' => 'App\\Observers',
                            'directory' => 'app/Observers',
                        ],
                        [
                            'accessor' => 'pivots',
                            'fullyQualifiedClassName' => Generator\Laravel\PivotGenerator::class,
                            'namespace' => 'App\\Models',
                            'directory' => 'app/Models',
                        ],
                        [
                            'accessor' => 'policies',
                            'fullyQualifiedClassName' => Generator\Laravel\PolicyGenerator::class,
                            'namespace' => 'App\\Policies',
                            'directory' => 'app/Policies',
                        ],
                        [
                            'accessor' => 'resources',
                            'fullyQualifiedClassName' => Generator\Laravel\ResourceGenerator::class,
                            'namespace' => 'App\\Http\\Resources',
                            'directory' => 'app/Http/Resources',
                        ],
                        [
                            'accessor' => 'resourceCollections',
                            'fullyQualifiedClassName' => Generator\Laravel\ResourceCollectionGenerator::class,
                            'namespace' => 'App\\Http\\Resources',
                            'directory' => 'app/Http/Resources',
                        ],
                        [
                            'accessor' => 'routes',
                            'fullyQualifiedClassName' => Generator\Laravel\RouteGenerator::class,
                            'namespace' => 'App\\Route',
                            'directory' => 'app/Route',
                        ],
                        [
                            'accessor' => 'rules',
                            'fullyQualifiedClassName' => Generator\Laravel\RuleGenerator::class,
                            'namespace' => 'App\\Rules',
                            'directory' => 'app/Rules',
                        ],
                        [
                            'accessor' => 'seeders',
                            'fullyQualifiedClassName' => Generator\Laravel\SeederGenerator::class,
                            'namespace' => 'Database\\Seeders',
                            'directory' => 'database/seeders',
                        ],
                        [
                            'accessor' => 'serviceProviders',
                            'fullyQualifiedClassName' => Generator\Laravel\ServiceProviderGenerator::class,
                            'namespace' => 'App\\Providers',
                            'directory' => 'app/Providers',
                        ],
                        [
                            'accessor' => 'views',
                            'fullyQualifiedClassName' => Generator\Laravel\ViewGenerator::class,
                            'namespace' => 'App\\View',
                            'directory' => 'resources/views',
                        ],
                        [
                            'accessor' => 'viewComponents',
                            'fullyQualifiedClassName' => Generator\Laravel\ViewComponentGenerator::class,
                            'namespace' => 'App\\View\\Components',
                            'directory' => 'app/View/Components',
                        ],
                        [
                            'accessor' => 'viewComposers',
                            'fullyQualifiedClassName' => Generator\Laravel\ViewComposerGenerator::class,
                            'namespace' => 'App\\View\\Composers',
                            'directory' => 'app/View/Composers',
                        ],
                    ],
                    'statements' => [
                        [
                            'methods' => ['redirect'],
                            'fullyQualifiedClassName' => Statement\Laravel\ActionRedirectStatement::class,
                        ],
                        [
                            'methods' => ['authorize', 'authorizeForUser', 'authorizeResource', 'can', 'canAny', 'cannot', 'cant'],
                            'fullyQualifiedClassName' => Statement\Laravel\AuthorizeStatement::class,
                        ],
                        [
                            'methods' => ['dispatch', 'dispatchAfterResponse', 'dispatchIf', 'dispatchSync', 'dispatchUnless'],
                            'fullyQualifiedClassName' => Statement\Laravel\DispatchStatement::class,
                        ],
                        [
                            'methods' => ['find', 'delete', 'save', 'update'],
                            'fullyQualifiedClassName' => Statement\Laravel\EloquentStatement::class,
                        ],
                        [
                            'methods' => ['fire'],
                            'fullyQualifiedClassName' => Statement\Laravel\FireStatement::class,
                        ],
                        [
                            'methods' => ['mail'],
                            'fullyQualifiedClassName' => Statement\Laravel\MailStatement::class,
                        ],
                        [
                            'methods' => ['notification'],
                            'fullyQualifiedClassName' => Statement\Laravel\NotificationStatement::class,
                        ],
                        [
                            'methods' => ['notify'],
                            'fullyQualifiedClassName' => Statement\Laravel\NotifyStatement::class,
                        ],
                        [
                            'methods' => ['query'],
                            'fullyQualifiedClassName' => Statement\Laravel\QueryStatement::class,
                        ],
                        [
                            'methods' => ['resource'],
                            'fullyQualifiedClassName' => Statement\Laravel\ResourceStatement::class,
                        ],
                        [
                            'methods' => ['resource'],
                            'fullyQualifiedClassName' => Statement\Laravel\ResourceCollectionStatement::class,
                        ],
                        [
                            'methods' => ['respond'],
                            'fullyQualifiedClassName' => Statement\Laravel\RespondStatement::class,
                        ],
                        [
                            'methods' => ['redirect'],
                            'fullyQualifiedClassName' => Statement\Laravel\RouteRedirectStatement::class,
                        ],
                        [
                            'methods' => ['flash', 'store'],
                            'fullyQualifiedClassName' => Statement\Laravel\SessionStatement::class,
                        ],
                        [
                            'methods' => ['validate'],
                            'fullyQualifiedClassName' => Statement\Laravel\ValidateStatement::class,
                        ],
                        [
                            'methods' => ['view'],
                            'fullyQualifiedClassName' => Statement\Laravel\ViewStatement::class,
                        ],
                    ],
                    'tokenizers' => [
                        Tokenizer\Laravel\ModelTokenizer::class => [
                            'addController' => true,
                            'addFactory' => true,
                            'addFormRequests' => true,
                            'addMigration' => true,
                            'addPolicy' => true,
                            'addResource' => true,
                            'addSeeder' => true,
                        ],
                        Tokenizer\Laravel\CastTokenizer::class,
                        Tokenizer\Laravel\CastableTokenizer::class,
                        Tokenizer\Laravel\ChannelTokenizer::class,
                        Tokenizer\Laravel\CommandTokenizer::class,
                        Tokenizer\Laravel\ControllerTokenizer::class,
                        Tokenizer\Laravel\EventTokenizer::class,
                        Tokenizer\Laravel\FactoryTokenizer::class,
                        Tokenizer\Laravel\FormRequestTokenizer::class,
                        Tokenizer\Laravel\GlobalScopeTokenizer::class,
                        Tokenizer\Laravel\JobTokenizer::class,
                        Tokenizer\Laravel\MailTokenizer::class,
                        Tokenizer\Laravel\MiddlewareTokenizer::class,
                        Tokenizer\Laravel\MigrationTokenizer::class,
                        Tokenizer\Laravel\NotificationTokenizer::class,
                        Tokenizer\Laravel\ObserverTokenizer::class,
                        Tokenizer\Laravel\PivotTokenizer::class,
                        Tokenizer\Laravel\PolicyTokenizer::class,
                        Tokenizer\Laravel\ResourceCollectionTokenizer::class,
                        Tokenizer\Laravel\ResourceTokenizer::class,
                        Tokenizer\Laravel\RouteTokenizer::class,
                        Tokenizer\Laravel\RuleTokenizer::class,
                        Tokenizer\Laravel\SeederTokenizer::class,
                        Tokenizer\Laravel\ServiceProviderTokenizer::class,
                        Tokenizer\Laravel\ViewComponentTokenizer::class,
                        Tokenizer\Laravel\ViewComposerTokenizer::class,
                        Tokenizer\Laravel\ViewTokenizer::class,
                    ],
                ],
                Extension\Laravel\NovaExtension::class => [
                    'generators' => [
                        [
                            'accessor' => 'nova.actions',
                            'fullyQualifiedClassName' => Generator\Laravel\Nova\ActionGenerator::class,
                            'namespace' => 'App\\Nova\\Actions',
                            'directory' => 'app/Nova/Actions',
                        ],
                        [
                            'accessor' => 'nova.dashboards',
                            'fullyQualifiedClassName' => Generator\Laravel\Nova\DashboardGenerator::class,
                            'namespace' => 'App\\Nova\\Dashboards',
                            'directory' => 'app/Nova/Dashboards',
                        ],
                        [
                            'accessor' => 'nova.filters',
                            'fullyQualifiedClassName' => Generator\Laravel\Nova\FilterGenerator::class,
                            'namespace' => 'App\\Nova\\Filters',
                            'directory' => 'app/Nova/Filters',
                        ],
                        [
                            'accessor' => 'nova.lenses',
                            'fullyQualifiedClassName' => Generator\Laravel\Nova\LensGenerator::class,
                            'namespace' => 'App\\Nova\\Lenses',
                            'directory' => 'app/Nova/Lenses',
                        ],
                        [
                            'accessor' => 'nova.metrics',
                            'fullyQualifiedClassName' => Generator\Laravel\Nova\MetricGenerator::class,
                            'namespace' => 'App\\Nova\\Metrics',
                            'directory' => 'app/Nova/Metrics',
                        ],
                        [
                            'accessor' => 'nova.resources',
                            'fullyQualifiedClassName' => Generator\Laravel\Nova\ResourceGenerator::class,
                            'namespace' => 'App\\Nova',
                            'directory' => 'app/Nova',
                        ],
                    ],
                    'tokenizers' => [
                        Tokenizer\Laravel\Nova\ActionTokenizer::class,
                        Tokenizer\Laravel\Nova\DashboardTokenizer::class,
                        Tokenizer\Laravel\Nova\FilterTokenizer::class,
                        Tokenizer\Laravel\Nova\LensTokenizer::class,
                        Tokenizer\Laravel\Nova\MetricTokenizer::class,
                        Tokenizer\Laravel\Nova\ResourceTokenizer::class,
                    ],
                ],
                Extension\InertiaExtension::class => [
                    'statements' => [
                        [
                            'methods' => ['inertia'],
                            'fullyQualifiedClassName' => Statement\Inertia\RenderStatement::class,
                        ],
                    ],
                ],
                Extension\LivewireExtension::class => [
                    'generators' => [
                        [
                            'accessor' => 'livewire.components',
                            'fullyQualifiedClassName' => Generator\Livewire\ComponentGenerator::class,
                            'namespace' => 'App\\Http\\Livewire',
                            'directory' => 'app/Http/Livewire',
                        ],
                        [
                            'accessor' => 'livewire.tests',
                            'fullyQualifiedClassName' => Generator\Livewire\TestGenerator::class,
                            'namespace' => 'Tests\\Feature\\Http\\Livewire',
                            'directory' => 'tests/Feature/Http/Livewire',
                        ],
                        [
                            'accessor' => 'livewire.views',
                            'fullyQualifiedClassName' => Generator\Livewire\ViewGenerator::class,
                            'namespace' => '',
                            'directory' => 'resources/views/livewire',
                        ],
                    ],
                    'tokenizers' => [
                        Tokenizer\Livewire\ComponentTokenizer::class,
                    ],
                ],
            ],
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Application Namespace
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default namespace for your application, which
    | will be used by the Arch namespace and reflection functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    public function appNamespace(string $appNamespace): static
    {
        $this->appNamespace = $appNamespace;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Application Path
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default directory for your application, which
    | will be used by the Arch configuration and path functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    public function appPath(string $appPath): static
    {
        $this->appPath = $appPath;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Arch Path
    |--------------------------------------------------------------------------
    |
    | When using the build command, we need a location where manifest and cache
    | files may be stored. A default has been set for you but a different
    | location may be specified. This is only needed for the build command.
    |
    */

    public function archPath(string $archPath): static
    {
        $this->archPath = $archPath;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Stub Path
    |--------------------------------------------------------------------------
    |
    | Most templating systems load templates from disk. Here you may specify
    | which path that should be checked for your views. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    public function stubPath(string $stubPath): static
    {
        $this->stubPath = $stubPath;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Class Renderer
    |--------------------------------------------------------------------------
    |
    | Here you may specify which implementation Arch will use to render the
    | class stubs and templates at runtime. When necessary, you may modify
    | this class reference; however, this default value is usually sufficient.
    |
    */

    public function classRenderer(string $classRenderer): static
    {
        $this->classRenderer = $classRenderer;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | File Renderer
    |--------------------------------------------------------------------------
    |
    | Here you may specify which implementation Arch will use to render the
    | file stubs and templates at runtime. When necessary, you may modify
    | this class reference; however, this default value is usually sufficient.
    |
    */

    public function fileRenderer(string $fileRenderer): static
    {
        $this->fileRenderer = $fileRenderer;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | String Renderer
    |--------------------------------------------------------------------------
    |
    | Here you may specify which implementation Arch will use to render the
    | string stubs and templates at runtime. When necessary, you may modify
    | this class reference; however, this default value is usually sufficient.
    |
    */

    public function stringRenderer(string $stringRenderer): static
    {
        $this->stringRenderer = $stringRenderer;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Manifest
    |--------------------------------------------------------------------------
    |
    | Here you may specify which implementation Arch will use to generate the
    | build report in the `.arch` directory. When necessary, you may modify
    | this class reference; however, this default value is usually sufficient.
    |
    */

    public function reporter(string $reporter): static
    {
        $this->reporter = $reporter;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Parser
    |--------------------------------------------------------------------------
    |
    | Here you may specify which implementation Arch will use to parse the
    | manifest in the `.arch` directory. When necessary, you may modify
    | this class reference; however, this default value is usually sufficient.
    |
    */

    public function parser(string $parser): static
    {
        $this->parser = $parser;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Tree
    |--------------------------------------------------------------------------
    |
    | Here you may specify which implementation Arch will use to store the
    | tokens resulting from tokenizing. When necessary, you may modify
    | this class reference; however, this default value is usually sufficient.
    |
    */

    public function tree(string $tree): static
    {
        $this->tree = $tree;

        return $this;
    }

    /*
    |--------------------------------------------------------------------------
    | Extensions
    |--------------------------------------------------------------------------
    |
    | Here you may specify which extensions will be automatically enabled.
    | Feel free to add your own extensions to this array to grant expanded
    | functionality to the Arch scaffolding classes and commands.
    |
    */

    public function extensions(array $extensions): static
    {
        $this->extensions = $extensions;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'app_namespace' => $this->appNamespace,
            'app_path' => $this->appPath,
            'arch_path' => $this->archPath,
            'stub_path' => $this->stubPath,
            'class_renderer' => $this->classRenderer,
            'file_renderer' => $this->fileRenderer,
            'string_renderer' => $this->stringRenderer,
            'reporter' => $this->reporter,
            'parser' => $this->parser,
            'tree' => $this->tree,
            'extensions' => $this->extensions,
        ];
    }
}
