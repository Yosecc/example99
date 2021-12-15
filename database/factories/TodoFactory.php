<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'        => $this->faker->text,
            'description' => $this->faker->text,
            'limit_date'  => $this->faker->date,
            'order'       => $this->faker->randomDigit,
            'is_complete' => 0,
            'user_id'     => rand(1,10),
            'category_id' => rand(1,3),
        ];
    }
}
