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
        // 2 cách, cách 1 gọi luôn trực tiếp, cách 2 gọi gián tiếp thông qua 1 class
        // require_once("ProductData/loaisanpham.php");
        // $this->call(SanPhamSeeder::class);      
        // $this->call(ProductSeeder::class);   
        // $this->call(CarColorSeeder::class); 
        // $this->call(CarSeeder::class); 
        // $this->call(ColorSeeder::class); 
        $this->call(MemberSeeder::class); 

    }
}
