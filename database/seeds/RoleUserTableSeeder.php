<?php

use Illuminate\Database\Seeder;
use App\UserRole;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $createUser = new UserRole;
        $createUser->role_id = '1';
        $createUser->user_id = '1';
        $createUser->timestamps = false;
        $createUser->save();
        
        $createUser = new UserRole;
        $createUser->role_id = '2';
        $createUser->user_id = '1';
        $createUser->timestamps = false;
        $createUser->save();
        
        $createUser = new UserRole;
        $createUser->role_id = '3';
        $createUser->user_id = '1';
        $createUser->timestamps = false;
        $createUser->save();        
        
        $createUser = new UserRole;
        $createUser->role_id = '2';
        $createUser->user_id = '2';
        $createUser->timestamps = false;
        $createUser->save();  
        
        $createUser = new UserRole;
        $createUser->role_id = '3';
        $createUser->user_id = '2';
        $createUser->timestamps = false;
        $createUser->save();   
        
        $createUser = new UserRole;
        $createUser->role_id = '3';
        $createUser->user_id = '3';
        $createUser->timestamps = false;
        $createUser->save();         
    }
}
