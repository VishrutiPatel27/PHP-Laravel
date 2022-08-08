<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use Illuminate\Support\Facades\Hash; 

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([    

            'name' => 'Superadmin',  
   
            'email' => 'billservice@kcsitglobal.com',   

            'usertype' => '1',   

            'password' => Hash::make('mybill'),
   
         ]);    
    }
}