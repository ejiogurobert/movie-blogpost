<?php
namespace Database\Factories;

use App\Models\BlogPost;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogPostFactory extends Factory
{
    protected $model = BlogPost::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph,
            'movie_id' => Movie::factory(),
        ];
    }
}
