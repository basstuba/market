<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => $this->faker->unique()->numberBetween(2,11),
            'postcode' => $this->faker->postcode(),
            'address' => $this->faker->streetAddress(),
            'building' => $this->faker->secondaryAddress(),
            'img_url' => 'storage/image/user_icon.png',
        ];
    }
}
