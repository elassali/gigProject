<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class Roleseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->count(1)->create();
    }
}
