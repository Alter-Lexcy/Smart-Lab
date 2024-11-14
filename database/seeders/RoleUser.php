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
        Role::firstOrCreate(['name' => 'guru']);
        Role::firstOrCreate(['name' => 'murid']);
        $roleadmin = Role::firstOrCreate(['name'=>'admin']);

        $admin = User::create([
            'name'=>'Admin',
            'email'=>'Admin123@gmail.com',
            'password'=>Hash::make('123456789')
        ]);

        $admin->assignRole($roleadmin);
    }

}
