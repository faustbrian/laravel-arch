<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Contract;

use BaseCodeOy\Arch\Environment\GeneratorRepository;
use BaseCodeOy\Arch\Environment\StatementRepository;
use BaseCodeOy\Arch\Environment\TokenizerRepository;

interface EnvironmentInterface
{
    public function generators(): GeneratorRepository;

    public function statements(): StatementRepository;

    public function tokenizers(): TokenizerRepository;
}
