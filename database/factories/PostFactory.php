<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use LoopCraft\Blog\Models\Media;
use LoopCraft\Blog\Models\Post;
use LoopCraft\Blog\Models\User;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(4),
            'slug' => $this->faker->slug,
            'status' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'published_on' => $this->faker->date(),
            'published_by' => User::factory()->create()->published_by,
            'cover_image_id' => Media::factory(),
            'created_by' => User::factory()->create()->created_by,
            'featured' => $this->faker->boolean,
            'content' => $this->faker->paragraphs(3, true),
            'link' => $this->faker->regexify('[A-Za-z0-9]{200}'),
            'tint' => $this->faker->regexify('[A-Za-z0-9]{20}'),
            'soe' => '{}',
        ];
    }
}
