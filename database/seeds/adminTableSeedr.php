<?php

use Illuminate\Database\Seeder;

class adminTableSeedr extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(App\tbl_admin::class, 4)->create();
    }
}
