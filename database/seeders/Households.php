<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Household;
class Households extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Generate and save 10 family members
        for ($i = 1; $i <= 10; $i++) {
            FamilyMembers::create([
                'firstname' => 'First Name ' . $i,
                'middlename' => 'Middle Name ' . $i,
                'lastname' => 'Last Name ' . $i,
                'birthdate' => now()->subYears(20)->format('Y-m-d'), // Example birthdate 20 years ago
                'relationship_to_head' => 'Child',
                'gender' => 'Male', // Change as needed
                'age' => 20, // Change as needed
                'civil_status' => 'Single', // Change as needed
                'solo_parent' => 'No',
                'religion' => 'Catholic', // Change as needed
                'studying' => 'Yes',
                'not_studying' => '',
                'has_job' => 'No',
                'job' => '',
                'known_work' => '',
                'where' => '',
                'sector' => '',
                'position' => '',
                'monthly_income' => '',
                'level_of_nutrition' => '',
                'type_of_disability' => '',
                'household_id' => $i, // Assuming each family member belongs to a different household
            ]);
            // Create sample households
            $households = [
                [
                    'user_id' => 1,
                    'household_code' => 'HH001',
                    'year' => '2023',
                    'tag_no' => '12345',
                    'barangay' => 'Sample Barangay',
                    'purok' => 'Sample Purok',
                    'firstname' => 'John',
                    'middlename' => 'Doe',
                    'lastname' => 'Smith',
                    'status' => 0,
                ],
                // Add more household data as needed
            ];

            // Insert the data into the households table
            DB::table('household')->insert($households);
        }
    }
}