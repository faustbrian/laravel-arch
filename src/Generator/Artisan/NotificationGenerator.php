<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeNotificationCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class NotificationGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Notification
         */
        foreach (Tree::get('notifications') as $notification) {
            $artisan = new MakeNotificationCommand();
            $artisan->name($notification->name());
            $artisan->handle();
        }
    }
}
