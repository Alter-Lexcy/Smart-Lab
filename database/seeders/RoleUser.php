<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class RoleUser extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        User::create([
            'name'=>'Admin',
            'email'=>'admin123@gmail.com',
            'NIP'=>'123456789',
            'password'=>Hash::make('123456789')
        ])->assignRole('Admin','Guru','Murid');


    }

}
