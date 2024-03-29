<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Image;

class Imageseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Image::factory()->count(100)->create();
    }
}
