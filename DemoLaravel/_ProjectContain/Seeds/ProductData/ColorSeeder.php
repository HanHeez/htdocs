<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()    {   
        
        //insert nhiều phần tử 1 lúc
        DB::table('color')->insert(
            [
                array('tenmau' => 'red'),   
                array('tenmau' => 'green'),   
                array('tenmau' => 'blue'),   
                array('tenmau' => 'white'),   
            ]
        );
    }
}
