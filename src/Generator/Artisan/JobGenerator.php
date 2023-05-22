<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeJobCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class JobGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Job
         */
        foreach (Tree::get('jobs') as $job) {
            $artisan = new MakeJobCommand();
            $artisan->name($job->name());
            $artisan->handle();
        }
    }
}
