<?php

use Illuminate\Database\Seeder;

class TeamsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 100; $i++) {
            factory(\App\Teams::class, 200)
                ->create()->each(function ($team) {
                    $team->players()->saveMany(factory(App\Players::class, 22)->make());
                });
        }
    }
}
