<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restrictedaccount;
class Restrictedaccountseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restrictedaccount::factory()->count(10)->create();
    }
}
