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
        $roleguru = Role::firstOrCreate(['name' => 'guru']);
        Role::firstOrCreate(['name' => 'murid']);

        $guru = User::create([
            'name' => 'Guru',
            'email' => 'guru123@gmail.com',
            'password' => Hash::make('123456789')
        ]);

        $guru->assignRole($roleguru);
    }

}
