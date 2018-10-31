<?php

use Illuminate\Database\Seeder;

class CarColorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()    {   
        
        //insert nhiều phần tử 1 lúc
        DB::table('cars_color')->insert(
            [                              
                array('maxe' => 1,'mamau' => 2),   
                array('maxe' => 1,'mamau' => 3),    
                array('maxe' => 1,'mamau' => 4), 
                array('maxe' => 2,'mamau' => 1),  
                array('maxe' => 2,'mamau' => 2),   
                array('maxe' => 2,'mamau' => 3),    
                array('maxe' => 2,'mamau' => 4),                    
                array('maxe' => 3,'mamau' => 3),    
                array('maxe' => 3,'mamau' => 4),  
                array('maxe' => 4,'mamau' => 4),                 
            ]
        );
    }
}
