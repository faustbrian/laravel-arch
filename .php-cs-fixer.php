<?php

declare(strict_types=1);

use BombenProdukt\PhpCsFixer\ConfigurationFactory;
use BombenProdukt\PhpCsFixer\Preset\Standard;

$config = ConfigurationFactory::fromPreset(new Standard());

/**
 * @var \PhpCsFixer\Finder $finder
 */
$finder = $config->getFinder();
$finder->in(__DIR__)->exclude('tests/Fixtures');

return $config;
