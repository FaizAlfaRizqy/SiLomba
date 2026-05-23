<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $adminRole = Role::findOrCreate('admin');
        $mahasiswaRole = Role::findOrCreate('mahasiswa');
        $ketuaTimRole = Role::findOrCreate('ketua_tim');

        // Create default admin
        $admin = User::updateOrCreate(
            ['email' => 'admin@silomba.com'],
            [
                'name' => 'Admin SiLomba',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );
        $admin->assignRole($adminRole);

        // Create a test mahasiswa
        $mahasiswa = User::updateOrCreate(
            ['email' => 'faiz@mahasiswa.com'],
            [
                'name' => 'Faiz Alfa Rizqy',
                'password' => Hash::make('password'),
                'role' => 'mahasiswa',
                'is_active' => true,
            ]
        );
        $mahasiswa->assignRole($mahasiswaRole);
    }
}
