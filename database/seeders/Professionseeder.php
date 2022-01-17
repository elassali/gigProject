<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Profession;
class Professionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Profession::factory()->count(30)->create();
    }
}
