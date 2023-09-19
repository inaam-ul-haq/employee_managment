<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()['cache']->forget('spatie.permission.cache');

        Role::create(['name' => 'admin']);

        $user1 = new User();
        $user1->name = 'Inaam ul haq';
        $user1->uid = Str::uuid();
        $user1->email = 'waleedhaq339@gmail.com';
        $user1->password = Hash::make('Inaam@739');
        $user1->save();
        $user1->assignRole('admin');
    }
}
