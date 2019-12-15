<?php
use  Illuminate\Database\Seeder;

class UserSeeder extends Seeder{
    public function run(){

        DB::table('users')->insert([
            [
                'name'     => 'nhan', 
                'email'    => 'nhan2604@gmail.com',
                'password' => bcrypt('matkhau'),
                'age'      => '20',
                'role'     =>'1'
            
            ],
            
            [
                'name'     => 'xinh', 
                'email'    => 'xinh1710@gmail.com',
                'password' => bcrypt('matkhau'),
                'age'      => '20',
                'role'     =>'0'
                
            ],

            [
                'name'     => 'thang', 
                'email'    => 'thang2312@gmail.com',
                'password' => bcrypt('matkhau'),
                'age'      => '20',
                'role'     =>'0'
            ]

            
        ]);


    }
}