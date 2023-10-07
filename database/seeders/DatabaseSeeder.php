<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Models\FamilyMembers;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    // Disable foreign key checks
        
    
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Truncate the users table
        DB::table('users')->truncate();

        // Enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        // Create an admin user
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'), // Change 'password' to the desired admin password
            'role' => 0,
        ]);

        // Create sub-admin users with corresponding barangays
        $barangays = [
            "Barangay I (Poblacion)",
            "Barangay II (Poblacion)",
            "Barangay III (Poblacion)",
            "Barangay IV (Poblacion)",
            "San Agustin",
            "San Antonio",
            "San Bartolome",
            "San Felix",
            "San Fernando",
            "San Francisco",
            "San Isidro Norte",
            "San Isidro Sur",
            "San Joaquin",
            "San Jose",
            "San Juan",
            "San Luis",
            "San Miguel",
            "San Pablo",
            "San Pedro",
            "San Rafael",
            "San Roque",
            "San Vicente",
            "Santa Ana",
            "Santa Anastacia",
            "Santa Clara",
            "Santa Cruz",
            "Santa Elena",
            "Santa Maria",
            "Santiago",
            "Santa Teresita",
        ];

        foreach ($barangays as $key => $barangay) {
            $username = 'subadmin' . ($key + 1);
            User::create([
                'name' => 'Sub Admin ' . $barangay,
                'email' => $username . '@example.com',
                'password' => bcrypt('password'), // Change 'password' to the desired sub-admin password
                'role' => 1,
                'barangay' => $barangay,
            ]);
        }

        $this->command->info('Users seeded successfully.');
    }

    
}
