<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        //insert 1 phần tử
        DB::table('product')->insert(
            ['name' => "Samsung s8",
             'price' => 23000,
             'category' => 'mobile phone'                  
            ]
        );
        //insert nhiều phần tử 1 lúc
        DB::table('product')->insert(
            [
                array('name' => 'Motorola','price' => 20000, 'category' => 'mobile phone'),   
                array('name' => 'Nokia', 'price' => 300000, 'category' => 'mobile phone'),       
            ]
        );
    }
}
