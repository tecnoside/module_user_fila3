<?php

declare(strict_types=1);

namespace Modules\User\Database\Factories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\User\Models\ModelHasPermission;

final class ModelHasPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var class-string<Model>
     */
    protected $model = ModelHasPermission::class;

    /**
     * Define the model's default state.
     *
     * @psalm-return array<never, never>
     */
    public function definition(): array
    {
        return [
        ];
    }
}
