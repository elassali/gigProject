<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
class Cityseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        City::factory()->count(110)->create();
    }
}
