<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Generator\Laravel;

use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;
use BaseCodeOy\Arch\Model\Notification;

final class NotificationGenerator extends AbstractGenerator
{
    #[\Override()]
    public function generate(): void
    {
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
