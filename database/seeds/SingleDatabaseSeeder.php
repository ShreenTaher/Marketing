<?php
namespace App\Database\Seeds;

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Modules\User\Entities\Permission;
use Modules\User\Entities\Role;

// TODO:- split each seeder method in seperated seed file 

class SingleDatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->addTestAdmin();
    }

    /**
    * Temporary workaround to add admin user till finishing restaurant registration 
    * so developer can test and develop apis that required access_token and admin role  
    * @param
    * @return
    */
    private function addTestAdmin(){
        $admin = User::create(['email' => "admin@sharinggroup.co", 'password' => Hash::make("123456"),'pin' => 1234,'first_name' => 'Super','last_name' => 'Admin']);
        $admin->assignRole('admin');
    }
}