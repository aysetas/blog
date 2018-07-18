<?php

use Illuminate\Database\Seeder;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([

            "name"=>"Ayse Tas",
            "email"=>"aysetas464@gmail.com",
            "password"=>bcrypt("123456")
        ]);
        DB::table("role_users")->insert(["role_id"=>1,"user_id"=>1]);
        DB::table("role_users")->insert(["role_id"=>2,"user_id"=>1]);
        DB::table("role_users")->insert(["role_id"=>3,"user_id"=>1]);
    }
}
