<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\DocumentFileState;
use App\Models\Role;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Database\Seeders\SourceSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        $this->call([
        
            
            CreateUserAdminSeeder::class,
            TransactionSeeder::class,
        ]);
      
    }
}
