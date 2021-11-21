<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->sentence(6, true);

        return [
            'slug' => Str::slug($title),
            'title' => $title,
            'description' => $this->faker->paragraphs(7, true),
            'image_path' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        ];
    }
}
