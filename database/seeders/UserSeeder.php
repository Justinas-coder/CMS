<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if($user = User::where('email', 'admin@mail.com')->first()){
            $user->delete();
        }
        User::create([
            'username' => 'JustAnken',
            'name' => 'Justinas',
            'email' => 'admin@mail.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now()
        ]);
    }
}
