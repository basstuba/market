<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        static $combinations = [];

        if (empty($combinations)) {
            $userIds = range(2, 11);
            $itemIds = range(1, 20);

            foreach ($userIds as $userId) {
                foreach ($itemIds as $itemId) {
                    $combinations[] = ['user_id' => $userId, 'item_id' => $itemId];
                }
            }

            shuffle($combinations);
        }

        if (empty($combinations)) {
            throw new \Exception('No more unique combinations available');
        }

        $combination = array_pop($combinations);

        return [
            'user_id' => $combination['user_id'],
            'item_id' => $combination['item_id'],
        ];
    }
}
