<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeActionCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class ActionGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Action
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
