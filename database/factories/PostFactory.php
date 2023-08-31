<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_posts' => fake()->sentence(mt_rand(2, 8)),
            'slug_posts' => fake()->slug(),
            'excerpt_posts' => fake()->paragraph(),
            // 'body' => '<p>'. implode('</p><p>',fake()->paragraphs(mt_rand(5,10))). '</p>',
            'body_posts' => collect(fake()->paragraphs(mt_rand(5, 10)))
                ->map(fn ($p) => "<p>$p</p>")
                ->implode(''),
            'id_user' => mt_rand(1, 3),
            'id_category' => mt_rand(1, 2)
        ];
    }
}
