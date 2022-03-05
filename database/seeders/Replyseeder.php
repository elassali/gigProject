<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reply;
class Replyseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::factory()->count(100)->create();
    }
}
