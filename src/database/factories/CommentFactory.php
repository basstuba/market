<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(2,11),
            'item_id' => $this->faker->numberBetween(1,20),
            'comment' => $this->faker->realText(50),
        ];
    }
}
