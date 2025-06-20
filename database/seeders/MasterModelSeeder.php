<?php

namespace Database\Seeders;

use App\Models\MasterMake;
use App\Models\MasterModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as FakerFactory;
use Faker\Provider\FakeCar;

class MasterModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /** @var \Faker\Generator|\Faker\Provider\FakeCar $faker */
        $faker = FakerFactory::create();
        $faker->addProvider(new FakeCar($faker)) ;


        $makes = MasterMake::all();

        for($i=0; $i<20;$i++){
            $make = $makes->random();

            MasterModel::firstOrCreate([
                "name"=> $faker->vehicleModel($make->name),
                "master_make_id"=> $make->id,
            ]);


            
        }
    }
}
