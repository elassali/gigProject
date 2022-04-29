<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\userRole;

class RoleUserseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        userRole::factory()->count(10)->create();
    }
}
