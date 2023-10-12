<?php

namespace Database\Seeders;
use App\Models\Question2;
use App\Models\Question3;
use App\Models\Question4;
use App\Models\Question5;
use App\Models\Question6;
use App\Models\Question9;
use App\Models\Question10;
use App\Models\Question11;
use App\Models\Question12;
use App\Models\Question14;
use App\Models\Question15;
use App\Models\Question16;
use App\Models\Question17;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
class HouseholdsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   
     public function run(): void
     {
        $faker = Faker::create();
 
        $households = [];
        $familyMembers = [];
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
        $purok = [
            "Purok 1",
            "Purok 2",
            "Purok 3",
            "Purok 4",
            "Purok 5",
            "Purok 6",
            "Purok 7",
        ];
        $bayan = [
            "Agoncillo",
            "Alitagtag",
            "Balayan",
            "Balete",
            "Bauan",
            "Calaca",
            "Calatagan",
            "Cuenca",
            "Ibaan",
            "Laurel",
            "Lemery",
            "Lian",
            "Lobo",
            "Mabini",
            "Malvar",
            "Mataasnakahoy",
            "Nasugbu",
            "Padre Garcia",
            "Rosario",
            "San Jose",
            "San Juan",
            "San Luis",
            "San Nicolas",
            "San Pascual",
            "Santa Teresita",
            "Santo Tomas",
            "Taal",
            "Talisay",
            "Tanauan",
            "Taysan",
            "Tingloy",
            "Tuy",
        ];
        for ($i = 0; $i < 500; $i++) {
             $household = [
                 'household_code' => $faker->unique()->bothify('H####'),
                 'year' => $faker->numberBetween(2020, 2023),
                 'tag_no' => $faker->randomNumber(3),
                 'barangay' => $faker->numberBetween(1, 30),
                 'purok' => $faker->randomElement($purok),
                 'firstname' => $faker->firstName,
                 'middlename' => $faker->lastName,
                 'lastname' => $faker->lastName,
                 'status' => $faker->numberBetween(0, 1),
                 'user_id' => 1,
             ];
 
             $householdId = DB::table('household')->insertGetId($household);
             $household['id'] = $householdId;
 
             $households[] = $household;
             
            Question2::create([
                'household_id' => $household['id'],
                'answer1_q2' => $faker->address,
                'answer2_q2' => $faker->randomElement($barangays),
                'answer3_q2' => $faker->numberBetween(1999, date('Y')),
            ]);

            Question3::create([
                'household_id' => $household['id'],
                'answer1_q3' => $faker->address,
                'answer2_q3' => $faker->randomElement($barangays),
                'answer3_q3' => $faker->address,
                'answer4_q3' => $faker->randomElement($barangays),
            ]);

            Question4::create([
                'household_id' => $household['id'],
                'answer1_q4' => $faker->randomElement($bayan),
                'answer2_q4' => "Batangas",
                'answer3_q4' => $faker->numberBetween(1999, date('Y')),
            ]);

            Question5::create([
                'household_id' => $household['id'],
                'answer1_q5' => $faker->numberBetween(1, 3),
            ]);

            Question6::create([
                'household_id' => $household['id'],
                'answer1_q6' => $faker->numberBetween(1, 3),
            ]);

            Question9::create([
                'household_id' => $household['id'],
                'if_yes' => $faker->numberBetween(1, 2),
                'answer1_q9' => $faker->firstName,
                'answer2_q9' => $faker->sentence,
                'answer3_q9' => $faker->sentence,
                'answer4_q9' => $faker->sentence,
            ]);
            
            Question10::create([
                'household_id' => $household['id'],
                'answer1_q10' => $faker->numberBetween(1, 2),
                'answer2_q10' => $faker->sentence,
                'answer3_q10' => $faker->numberBetween(1, 3),
                'answer4_q10' => $faker->sentence,
            ]);

            Question11::create([
                'household_id' => $household['id'],
                'answer1_q11' => $faker->numberBetween(1, 4),
                'answer2_q11' => $faker->numberBetween(1, 2),
                'answer3_q11' => $faker->numberBetween(1, 7),
                'answer4_q11' => $faker->sentence,
                'answer5_q11' => $faker->sentence,
            ]);

            Question12::create([
                'household_id' => $household['id'],
                'answer1_q12' => $faker->numberBetween(1, 3),
                'answer2_q12' => $faker->sentence,
                'answer3_q12' => $faker->numberBetween(1, 4),
                'answer4_q12' => $faker->sentence,
            ]);

            Question14::create([
                'household_id' => $household['id'],
                'answer1_q14' => $faker->numberBetween(1, 4),
                'answer2_q14' => $faker->sentence,
            ]);

            Question15::create([
                'household_id' => $household['id'],
                'answer1_q15' => $faker->numberBetween(1, 2),
                'answer2_q15' => $faker->sentence,
                'answer3_q15' => $faker->numberBetween(1, 3),
                'answer4_q15' => $faker->sentence,
            ]);

            Question16::create([
                'household_id' => $household['id'],
                'answer1_q16' => $faker->numberBetween(1, 2),
                'answer2_q16' => $faker->sentence,
            ]);

            Question17::create([
                'household_id' => $household['id'],
                'answer1_q17' => $faker->numberBetween(1, 2),
                'answer2_q17' => $faker->sentence,
                'answer3_q17' => $faker->sentence,
            ]);

            $numFamilyMembers = $faker->numberBetween(2, 5);
 
            for ($j = 0; $j < $numFamilyMembers; $j++) {
                $familyMember = [
                    'household_id' => $household['id'],
                    'firstname' => $faker->firstName,
                    'middlename' => $faker->lastName,
                    'lastname' => $faker->lastName,
                    'birthdate' => $faker->date,
                    'relationship_to_head' => $faker->numberBetween(1, 12),
                    'gender' => $faker->numberBetween(1, 2),
                    'age' => $faker->numberBetween(0, 100),
                    'civil_status' => $faker->numberBetween(1, 5),
                    'solo_parent' => $faker->numberBetween(1, 2),

                    'religion' => $faker->numberBetween(1, 6),
                    'ibang_relihiyon' => $faker->word,

                    'studying' => $faker->numberBetween(1, 8),

                    
                    'has_job' => $faker->numberBetween(1, 2),
                    
                    'job' => $faker->sentence,
                    'known_work' => $faker->sentence,
                    'where' => $faker->numberBetween(1, 7),
                    'iba_pa_saan' => $faker->sentence,
                    'sector' => $faker->numberBetween(1, 5),
                    'iba_pa_sektor' => $faker->word,
                    'position' => $faker->numberBetween(1, 6),
                    'monthly_income' => $faker->randomFloat(2, 4000, 100000),
                    
                    'level_of_nutrition' => $faker->numberBetween(1, 3),
                    'type_of_disability' => $faker->numberBetween(1, 12),
                    'iba_pa_kapansanan' => $faker->word
                ];
               
                $familyMembers[] = $familyMember;
            }
        }
 
         DB::table('family_members')->insert($familyMembers);
     }
}


