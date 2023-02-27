<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_employee' => $this->faker->unique()->randomNumber(6),
            'fullname' => $this->faker->name("female"),
            'image' => $this->faker->imageUrl(480, 640, null, true, null, true),
            'pob' => $this->faker->city(),
            'dob' => $this->faker->date(),
            'address' => $this->faker->address(),
            'religion' => $this->faker->religion(),
            'marital_status' => $this->faker->marriedStatus(),
            'position' => $this->faker->position(),
            'division' => $this->faker->division(),
            'nationality' => $this->faker->nationality(),
        ];
    }
}
