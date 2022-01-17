<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reportedaccount;

class Reportedaccountseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reportedaccount::factory()->count(200)->create();
    }
}
