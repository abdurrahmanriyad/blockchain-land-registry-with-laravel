<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        // create default townships
        $faker = Faker\Factory::create();
        for ($i = 0; $i < 30; $i++) {
            \App\Models\Township::create([
                'code' => $faker->numberBetween(1000000, 22002038),
                'area' => $faker->numberBetween(20, 500),
                'location' => $faker->address,
                'latitude' => $faker->numberBetween(232322, 44534445),
                'longitude' => $faker->numberBetween(232322, 44534445)
            ]);
        }
    }
}
