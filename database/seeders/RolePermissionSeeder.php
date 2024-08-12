<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // add role and default user for super admin
        $ownerRole = Role::create([
            'name' => 'owner'
        ]);
        $studentRole = Role::create([
            'name' => 'student'
        ]);
        $teacherRole = Role::create([
            'name' => 'teacher'
        ]);
        $userOwner = User::create([
            'name' => 'abah cs',
            'occupation' => 'owner',
            'avatar' => 'images/default-avatar.png',
            'email' => 'abah@owner.com',
            'password' => bcrypt('okokokok1!')
        ]);

        $userOwner->assignRole($ownerRole);
    }
}
