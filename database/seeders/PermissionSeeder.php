<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $baseNames = ['leader', 'offline_account', 'user', 'program'];
        $actions = ['view_any', 'view', 'create', 'update', 'delete', 'delete_any'];

        $permissions = [];
        $guardName = 'web'; // Set your desired guard name here

        foreach ($baseNames as $base) {
            foreach ($actions as $action) {
                $permissions[] = [
                    'name' => $action . '_' . $base,
                    'guard_name' => $guardName, // Add guard_name here
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        // Insert permissions into the database
        Permission::insert($permissions);
    }
}
