<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;
class Messageseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Message::factory()->count(200)->create();
    }
}
