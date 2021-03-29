<?php

namespace Database\Factories;

use App\Models\Ministere;
use Illuminate\Database\Eloquent\Factories\Factory;

class MinistereFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Ministere::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom'               =>$this->faker->firstNameFemale,
            'ministre_nom'              =>$this->faker->firstNameFemale,
            'adresse'                   =>$this->faker->address,
            'boite_postale'                       =>$this->faker->postcode,
            'ministre_nommination_date' =>$this->faker->dateTime($max = 'now', $timezone = null)

        ];
    }
}
