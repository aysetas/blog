<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles=array(
            array("name"=>"admin"),
            array("name"=>"author"),
            array("name"=>"standart")
        );
        foreach ($roles as $role){
            Role::create($role);
        }
    }
}
