<?php

use App\Role;
use Illuminate\Database\Seeder;

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

        $roles = array(
            array('name' => 'admin'),
            array('name' => 'affiliate'),
            array('name' => 'editor'),
            array('name' => 'user')
        );

        foreach ($roles as $role){
            Role::create($role);
        }
    }
}
