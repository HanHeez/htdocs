<?php

use Illuminate\Database\Seeder;

class SanPhamSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {   
        //insert 1 phần tử
        DB::table('sanpham')->insert(
            ['tensp' => "Iphone 7s",
             'soluong' => 14,
             'gia' => 20000,
             'maloaisp' => 1,        
            ]
        );
        //insert nhiều phần tử 1 lúc
        DB::table('sanpham')->insert(
            [
                array('tensp' => "Iphone 1s",'soluong' => 14, 'gia' => 20000,'maloaisp' => 1),   
                array('tensp' => "Iphone 8s",'soluong' => 11, 'gia' => 200000,'maloaisp' => 1),       
            ]
        );
    }
}
