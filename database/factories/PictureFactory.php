<?php

namespace Database\Factories;

use App\Models\Picture;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class PictureFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Picture::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'author' => $this->faker->name(),
            'content' => $this->faker->text($maxNbChars = 200) ,
            'date' => now(),
            "numLikes" => $this->faker->numberBetween(1,999), // password
            'picture' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
