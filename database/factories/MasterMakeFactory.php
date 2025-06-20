<?php

namespace Database\Factories;

use Faker\Provider\FakeCar;
use Faker\Factory as FakerFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MasterMake>
 */
class MasterMakeFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        /** @var \Faker\Generator|\Faker\Provider\FakeCar $faker */
        $faker = FakerFactory::create();
        $faker->addProvider(new FakeCar($faker)) ;


        return[
            'name'=> $faker->unique()->vehicleBrand(),
        ];
    }
}
