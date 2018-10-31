<?php

use Illuminate\Database\Seeder;

class MemberSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()    {   
        
        //insert nhiều phần tử 1 lúc
        DB::table('member')->insert(
            [
                array('user' => 'long', 'password' => Hash::make(123456), 'level' => 1),   
                array('user' => 'tun', 'password' => Hash::make(123), 'level' => 2),  
                array('user' => 'tuan', 'password' => bcrypt(123), 'level' => 2),    
            ]
        );
    }
}