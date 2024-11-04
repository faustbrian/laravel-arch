<?php

declare(strict_types=1);

namespace BaseCodeOy\Arch\Generator\Artisan;

use BaseCodeOy\Arch\Artisan\Laravel\Nova\MakeAssetCommand;
use BaseCodeOy\Arch\Facade\Tree;
use BaseCodeOy\Arch\Generator\AbstractGenerator;

final class AssetGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BaseCodeOy\Arch\Model\Nova\Asset
         */
        foreach (Tree::get('nova.assets') as $asset) {
            $artisan = new MakeAssetCommand();
            $artisan->name($asset->name());
            $artisan->handle();
        }
    }
}
