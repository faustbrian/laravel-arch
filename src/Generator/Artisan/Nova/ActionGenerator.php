<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeActionCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class ActionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Action
         */
        foreach (Tree::get('nova.actions') as $action) {
            $artisan = new MakeActionCommand();
            $artisan->name($action->name());

            if ($action->shouldBeDestructive()) {
                $artisan->destructive();
            }

            if ($action->shouldBeQueued()) {
                $artisan->queued();
            }

            $artisan->handle();
        }
    }
}
