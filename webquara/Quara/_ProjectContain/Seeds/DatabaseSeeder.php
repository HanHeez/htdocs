<?php

use Illuminate\Database\Seeder;

foreach ( glob(dirname(__FILE__) . '/_ProjectContain/Seeds/ProductData/*.php') as $class_path )
        require_once( $class_path );


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    }
}
