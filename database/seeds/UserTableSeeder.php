<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->delete();

        \DB::table('users')->insert([
            0 => [
                'id'             => 1,
                'activated'      => 1,
                'name'           => 'Administrator',
                'email'          => 'admin@example.com',
                'profile_photo'  => 'dummy.png',
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
                'created_at'     => '2016-09-06 13:42:19',
                'updated_at'     => '2016-09-06 13:42:19',
            ],
           1 => [
                'id'             => 2,
                'activated'      => 1,
                'name'           => 'Moderator',
                'email'          => 'moderator@example.com',
                'profile_photo'  => 'dummy.png',
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
                'created_at'     => '2016-09-06 13:42:19',
                'updated_at'     => '2016-09-06 13:42:19',
            ],
           2 => [
                'id'             => 3,
                'activated'      => 1,
                'name'           => 'User',
                'email'          => 'user@example.com',
                'profile_photo'  => 'dummy.png',
                'password'       => bcrypt('12345678'),
                'remember_token' => null,
                'created_at'     => '2016-09-06 13:42:19',
                'updated_at'     => '2016-09-06 13:42:19',
            ],
        ]);
    }
}
