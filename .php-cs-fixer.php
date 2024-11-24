<?php

declare(strict_types=1);

use BaseCodeOy\Standards\ConfigurationFactory;
use BaseCodeOy\Standards\Presets\Standard;

$config = ConfigurationFactory::createFromPreset(new Standard());

/**
 * @var \PhpCsFixer\Finder $finder
 */
$finder = $config->getFinder();
$finder->in(__DIR__)->exclude('tests/Fixtures');

return $config;
