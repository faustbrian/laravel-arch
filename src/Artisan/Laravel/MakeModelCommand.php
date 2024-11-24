<?php declare(strict_types=1);

/**
 * Copyright (C) BaseCode Oy - All Rights Reserved
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 */

namespace BaseCodeOy\Arch\Artisan\Laravel;

use BaseCodeOy\Arch\Artisan\AbstractCommand;

final class MakeModelCommand extends AbstractCommand
{
    /**
     * Generate a migration, seeder, factory, policy, resource controller, and form request classes for the model
     */
    public function all(): static
    {
        $this->option('all');

        return $this;
    }

    /**
     * Create a new controller for the model
     */
    public function controller(): static
    {
        $this->option('controller');

        return $this;
    }

    /**
     * Create a new factory for the model
     */
    public function factory(): static
    {
        $this->option('factory');

        return $this;
    }

    /**
     * Create the class even if the model already exists
     */
    public function force(): static
    {
        $this->option('force');

        return $this;
    }

    /**
     * Create a new migration file for the model
     */
    public function migration(): static
    {
        $this->option('migration');

        return $this;
    }

    /**
     * Indicates if the generated model should be a custom polymorphic intermediate table model
     */
    public function morphPivot(): static
    {
        $this->option('morph-pivot');

        return $this;
    }

    /**
     * Create a new policy for the model
     */
    public function policy(): static
    {
        $this->option('policy');

        return $this;
    }

    /**
     * Create a new seeder for the model
     */
    public function seed(): static
    {
        $this->option('seed');

        return $this;
    }

    /**
     * Indicates if the generated model should be a custom intermediate table model
     */
    public function pivot(): static
    {
        $this->option('pivot');

        return $this;
    }

    /**
     * Indicates if the generated controller should be a resource controller
     */
    public function resource(): static
    {
        $this->option('resource');

        return $this;
    }

    /**
     * Indicates if the generated controller should be an API resource controller
     */
    public function api(): static
    {
        $this->option('api');

        return $this;
    }

    /**
     * Create new form request classes and use them in the resource controller
     */
    public function requests(): static
    {
        $this->option('requests');

        return $this;
    }

    /**
     * Generate an accompanying PHPUnit test for the Model
     */
    public function test(): static
    {
        $this->option('test');

        return $this;
    }

    /**
     * Generate an accompanying Pest test for the Model
     */
    public function pest(): static
    {
        $this->option('pest');

        return $this;
    }

    protected function signature(): string
    {
        return 'make:model';
    }
}
