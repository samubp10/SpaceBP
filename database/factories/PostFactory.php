<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Post::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'date' => now(),
            'author' => $this->faker->name(),
            'content' => $this->faker->text($maxNbChars = 200),
            "numLikes" => $this->faker->numberBetween(1,999), // password
            'picture' => Str::random(10),
            'idUser' => $this->faker->numberBetween(1,5),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
