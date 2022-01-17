<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Offerdetail;

class Offerdetailseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Offerdetail::factory()->count(150)->create();
    }
}
