<?php

declare(strict_types=1);

use BaseCodeOy\PhpCsFixer\ConfigurationFactory;
use BaseCodeOy\PhpCsFixer\Preset\Standard;

$config = ConfigurationFactory::fromPreset(new Standard());

/**
 * @var \PhpCsFixer\Finder $finder
 */
$finder = $config->getFinder();
$finder->in(__DIR__)->exclude('tests/Fixtures');

return $config;
