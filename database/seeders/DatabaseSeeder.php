<?php

namespace Database\Seeders;

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
       $this->call(Replyseeder::class);
       $this->call(Conversationseeder::class);
       $this->call(Messageseeder::class);
       $this->call(Roleseeder::class);
       $this->call(RoleUserseeder::class);
    }
}
