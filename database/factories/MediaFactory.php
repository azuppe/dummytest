<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use LoopCraft\Blog\Models\Media;

class MediaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Media::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'file_name' => $this->faker->regexify('[A-Za-z0-9]{100}'),
            'disk' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'location' => $this->faker->regexify('[A-Za-z0-9]{50}'),
        ];
    }
}
