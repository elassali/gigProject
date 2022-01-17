<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Userprofession;

class Userprofessionseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Userprofession::factory()->count(50)->create();
    }
}
