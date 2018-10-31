<?php

use Illuminate\Database\Seeder;

class CarSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()    {   
        
        //insert nhiều phần tử 1 lúc
        DB::table('cars')->insert(
            [
                array('tenxe' => 'BMW','giatien' => 2000004),   
                array('tenxe' => 'Renault','giatien' => 5340004),   
                array('tenxe' => 'Fort','giatien' => 4006004),   
                array('tenxe' => 'Mercedes','giatien' => 145000004),   
            ]
        );
    }
}
