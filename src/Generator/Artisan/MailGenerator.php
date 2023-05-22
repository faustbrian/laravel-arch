<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\MakeMailCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class MailGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Mail
         */
        foreach (Tree::get('mails') as $mail) {
            $artisan = new MakeMailCommand();
            $artisan->name($mail->name());
            $artisan->handle();
        }
    }
}
