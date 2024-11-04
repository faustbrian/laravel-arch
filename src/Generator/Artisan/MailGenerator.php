<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\MakeMailCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class MailGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Mail
         */
        foreach (Tree::get('mails') as $mail) {
            $artisan = new MakeMailCommand();
            $artisan->name($mail->name());
            $artisan->handle();
        }
    }
}
