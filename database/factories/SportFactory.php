<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sport>
 */
class SportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(mt_rand(3,6)),
            'slug' => $this->faker->slug(),
            'excerpt' => $this->faker->paragraph(),
            // 'body' => $this->faker->paragraph(mt_rand(5,10)),
            'body' => collect($this->faker->paragraphs(mt_rand(5, 10)))
                ->map(fn($p) => "<p>$p</p>")
                ->implode(''),
            'user_id' => mt_rand(1,5),
            'category_id' => mt_rand(1,5)
        ];
    }
}
