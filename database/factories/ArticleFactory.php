<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'author_id' => User::factory(),
            'title' => $this->faker->sentence(),
            'body' => $this->faker->paragraphs(3, true),
            'slug' => $this->faker->unique()->slug(),
            'rand_id' => Str::random(10),
            'view_count' => $this->faker->numberBetween(0, 1000),
        ];
    }

    public function approved(): self
    {
        return $this->state(function (): array {
            return [
                'approved_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            ];
        });
    }

    public function unapproved(): self
    {
        return $this->state(function (): array {
            return [
                'approved_at' => null,
            ];
        });
    }
}
