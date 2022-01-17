<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Restoredaccount;

class Restoredaccountseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Restoredaccount::factory()->count(10)->create();
    }
}
