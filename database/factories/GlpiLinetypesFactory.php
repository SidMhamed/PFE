<?php

namespace Database\Factories;

use App\Models\glpi_linetypes;
use Illuminate\Database\Eloquent\Factories\Factory;

class GlpiLinetypesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = glpi_linetypes::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'name' => $this->faker->name(),
            // 'comment' => $this->faker->name(),
        ];
    }
}
