<?php

declare(strict_types=1);

namespace BombenProdukt\Arch\Generator\Artisan;

use BombenProdukt\Arch\Artisan\Laravel\Nova\MakeAssetCommand;
use BombenProdukt\Arch\Facade\Tree;
use BombenProdukt\Arch\Generator\AbstractGenerator;

final class AssetGenerator extends AbstractGenerator
{
    public function generate(): void
    {
        /**
         * @var \BombenProdukt\Arch\Model\Nova\Asset
         */
        foreach (Tree::get('nova.assets') as $asset) {
            $artisan = new MakeAssetCommand();
            $artisan->name($asset->name());
            $artisan->handle();
        }
    }
}
