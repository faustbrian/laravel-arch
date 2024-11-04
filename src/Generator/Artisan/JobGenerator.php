<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeJobCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class JobGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Job
         */
        foreach (Tree::get('jobs') as $job) {
            $artisan = new MakeJobCommand();
            $artisan->name($job->name());
            $artisan->handle();
        }
    }
}
