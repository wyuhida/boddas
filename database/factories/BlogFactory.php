<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use User;
use Auth;
use Carbon\Carbon;
class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->unique()->words($nb = 4, $asText = true);
        return [
            'title' => $title,
            'body_news' => $this->faker->text(500),
            'thumbnail' =>
                'blog-article-' .
                $this->faker->unique()->numberBetween(1, 22) .
                '.jpg',
            'update_by' => $this->faker->numberBetween(1, 2),
            'id_user' => $this->faker->numberBetween(1, 2),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
