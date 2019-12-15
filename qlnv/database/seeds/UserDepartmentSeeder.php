<?php
use  Illuminate\Database\Seeder;

class UserDepartmentSeeder extends Seeder{
    public function run(){

        DB::table('user_department')->insert([ 
            ['user_id' => 1, 'department_id' => 1, 'position' => 'Nhân viên'],
            ['user_id' => 2, 'department_id' => 2, 'position' => 'Nhân viên'],
            ['user_id' => 3, 'department_id' => 3, 'position' => 'Trưởng phòng'],
        ]);


    }
}