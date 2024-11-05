<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Notification;

final class NotificationGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Notification
         */
        foreach (Tree::get('notifications') as $notification) {
            $this->createFile(
                $notification->name(),
                $this->renderClass($notification, $this->stub($notification), [
                    'class' => $notification->name(),
                    'view' => $notification->view(),
                ]),
            );
        }

        $this->persist();
    }

    private function stub(Notification $notification): string
    {
        if ($notification->shouldBeMarkdown()) {
            if ($notification->shouldQueue()) {
                return 'laravel/notification/markdown/queued';
            }

            return 'laravel/notification/markdown/notification';
        }

        if ($notification->shouldQueue()) {
            return 'laravel/notification/queued';
        }

        return 'laravel/notification/notification';
    }
}
