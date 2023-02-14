<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        $user = \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $permissions = Permission::create(['name' => 'show articles']);
        $permissions = Permission::create(['name' => 'edit articles',]);

        $user->givePermissionTo([
            'show articles',
            'edit articles'
        ]);

        $userNoPermission = \App\Models\User::factory()->create([
            'name' => 'Test User No Permission',
            'email' => 'nopermissions@example.com',
        ]);

        Article::factory(50)->create();

    }
}
