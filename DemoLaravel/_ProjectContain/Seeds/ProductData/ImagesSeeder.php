<?php

use Illuminate\Database\Seeder;

class ImagesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()    {   
        
        //insert nhiều phần tử 1 lúc
        DB::table('images')->insert(
            [
                array('name' => 'sp2_hinh_1.jpg','masp' => 2),   
                array('name' => 'sp2_hinh_2.jpg','masp' => 2), 
                array('name' => 'sp2_hinh_3.jpg','masp' => 2),      
                array('name' => 'sp2_hinh_4.jpg','masp' => 2), 
                array('name' => 'sp3_hinh_1.jpg','masp' => 3), 
                array('name' => 'sp3_hinh_2.jpg','masp' => 3), 
                array('name' => 'sp3_hinh_3.jpg','masp' => 3), 
                array('name' => 'sp4_hinh_1.jpg','masp' => 4), 
                array('name' => 'sp4_hinh_2.jpg','masp' => 4), 
                array('name' => 'sp4_hinh_3.jpg','masp' => 4), 
                array('name' => 'sp4_hinh_4.jpg','masp' => 4), 
                array('name' => 'sp4_hinh_5.jpg','masp' => 4),                

            ]
        );
    }
}
