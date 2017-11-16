<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

    	// first way//calling model and seeding...
        factory(App\User::class, 5)->create();
        factory(App\tbl_admin::class, 5)->create();


    	// Second Way// eta hocce adminTableSeedr use kore ek sathe onek row seeding korar jonno..... adminTableSeedr e  factory(App\tbl_admin::class, 5)->create(); evabe call kora ace r baki kaj hocce ModelFactory.php te...


    	 //$this->call(adminTableSeedr::class);



    	//Third way //eta hocce ekti table er one row seeding korar jonno.... just evabe likhlei hobe.. onno kothao kicu likhte hobe na.


     //    DB::table('tbl_admins')->insert([
     //        'admin_name' => str_random(10),
     //        'admin_email' => str_random(10).'@gmail.com',
     //        'admin_password' => bcrypt('secret'),
     //    ]);



    }
}
