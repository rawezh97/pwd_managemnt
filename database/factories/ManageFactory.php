<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Crypt;

class ManageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'source' => $this->faker->domainName(),
            'username' => encrypt($this->faker->name()),
            'password' => encrypt($this->faker->password()), // password
            'link' => encrypt('http://'.$this->faker->domainName()),
            'userid' => 22,

            
        ];
    }
}
