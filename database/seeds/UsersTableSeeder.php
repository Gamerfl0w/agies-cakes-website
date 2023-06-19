<?php
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'id'=>1,
                'name'=>'Admin',
                'email'=>'admin@gmail.com',
                'phonenumber'=>'0912345678',
                'city'=>'Torrijos',
                'address'=>'Torrijos',
                'zipcode'=>'4903',
                'password'=>Hash::make('12345678'),
                'role'=>'Admin'
            ],
            [
                'id'=>2,
                'name'=>'User',
                'email'=>'user@gmail.com',
                'phonenumber'=>'0912345678',
                'city'=>'Torrijos',
                'address'=>'Torrijos',
                'zipcode'=>'4903',
                'password'=>Hash::make('12345678'),
                'role'=>'Customer'
            ],
            [
                'id'=>3,
                'name'=>'John Doe',
                'email'=>'john_doe@gmail.com',
                'phonenumber'=>'0912345678',
                'city'=>'city',
                'address'=>'Manila',
                'zipcode'=>'4903',
                'password'=>Hash::make('johndoe'),
                'role'=>'Customer'
            ],
            [
                'id'=>4,
                'name'=>'Emillie Norton',
                'email'=>'emillie_norton@gmail.com',
                'phonenumber'=>'0912345678',
                'city'=>'city',
                'address'=>'Manila',
                'zipcode'=>'4903',
                'password'=>Hash::make('johndoe'),
                'role'=>'Customer'
            ],
        ]);
    }
}