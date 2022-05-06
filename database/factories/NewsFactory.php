<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\News;

class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = News::class;


    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'content' => $this->faker->text($maxNbChars = 200)      ,
            'date' => now(),
            "numLikes" => $this->faker->numberBetween(1,999), // password
            'picture' => $this->faker->text(200)     ,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
