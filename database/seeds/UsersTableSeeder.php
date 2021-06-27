<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=User::create([
            'name'=>'SuperAdmin',
            'email'=>'admin@kcgroup.com',
            'password'=>Hash::make('admin@kcgroup'),
        ]);
    }
}
