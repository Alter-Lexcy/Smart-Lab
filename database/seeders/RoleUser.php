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
        $roleguru =Role::firstOrCreate(['name' => 'Guru']);
        Role::firstOrCreate(['name' => 'Murid']);
        $roleadmin = Role::firstOrCreate(['name'=>'Admin']);

        $admin = User::create([
            'name'=>'Admin',
            'email'=>'admin123@gmail.com',
            'NIP'=>'123456789',
            'password'=>Hash::make('123456789')
        ]);

        $admin->assignRole($roleadmin );
        $admin->assignRole($roleguru);
    }

}
