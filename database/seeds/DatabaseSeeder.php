<?php

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
        \App\Model\Admin::insert([
            'name'      => 'admin',
            'email'     => 'admin@tamkeen.it',
            'password'  => bcrypt(123456)
        ]);
    }
}
