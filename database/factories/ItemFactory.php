<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Items>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $item_type = array('home','system','kitchen');

        return [
            'item_name' => $this->faker->name(),
            'item_price' => $this->faker->numberBetween(100,999),
            'item_date' => $this->faker->dateTimeThisCentury->format('Y-m-d'),
            'item_number' => $this->faker->numberBetween(1,15),
            'item_type' => $item_type[rand(0,2)],
        ];
    }
}
