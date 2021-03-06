<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // 'user_id'=> User::factory()->create(),
            'title' => $this->faker->sentence,
            'post_image'=> $this->faker->imageUrl(width:'900', height:'300'),
            'body' => $this->faker->paragraph

            //
        ];
    }
}
