<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Reportedaccount;
use App\Models\Ticketdetail;
use App\Models\Userprofession;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(Userseeder::class);
       $this->call(Cityseeder::class);
       $this->call(Professionseeder::class);
       $this->call(Userprofessionseeder::class);
       $this->call(Ticketseeder::class);
       $this->call(Ticketdetailseeder::class);
       $this->call(Offerseeder::class);
       $this->call(Offerdetailseeder::class);
       $this->call(Reportedaccountseeder::class);
       $this->call(Portfolioseeder::class);
       $this->call(Commentseeder::class);
       $this->call(Imageseeder::class);
    }
}
