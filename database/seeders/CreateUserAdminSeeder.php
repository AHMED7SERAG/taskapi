<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CreateUserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                  
        // assign All Permissions for admin Role
        $role = Role::where('name' ,'admin')->first();

        if( !$role ){
                Role::create(['id'=> 1,'name' => 'admin', 'label' => 'admin']);
        }
        $user = User::where('email' ,'admin@admin.com')->first();

        if( !$user ){
            $user = User::create([
                'name' => 'admin' ,
                'email'=> 'admin@admin.com',
                'phone' => "01077451815",
                'password' => Hash::make("123456789"),
            ]);
        }
        if(!($user->hasRole('admin'))){
                $user->assignRole(['admin']);
        }


        
        $role = Role::where('name' ,'user')->first();

        if( !$role ){
                Role::create(['id'=> 2 ,'name' => 'user', 'label' =>"user"]);
        }
        $user = User::where('email' ,'user@user.com')->first();

        if( !$user){
            $user = User::create([
                'name' => 'user' ,
                'email'=> 'user@user.com',
                'phone' => "01024515315",
                'password' => Hash::make("123456789"),
            ]);
        }
        if(!($user->hasRole('user'))){
                $user->assignRole(['user']);
        }

    }
}
