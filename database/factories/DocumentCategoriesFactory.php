<?php

namespace Database\Factories;

use App\Models\DocumentCategories;
use Illuminate\Database\Eloquent\Factories\Factory;

class DocumentCategoriesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DocumentCategories::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'Comment' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            // 'level' => $this->faker->level(),
            // 'ancestors_cache' => $this->faker->ancestors_cache(),
            // 'sons_cache' => $this->faker->sons_cache(),
        ];
    }
}
