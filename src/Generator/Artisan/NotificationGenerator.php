<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeNotificationCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class NotificationGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Notification
         */
        foreach (Tree::get('notifications') as $notification) {
            $artisan = new MakeNotificationCommand();
            $artisan->name($notification->name());
            $artisan->handle();
        }
    }
}
