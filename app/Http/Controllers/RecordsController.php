<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Household;
use App\Models\FamilyMembers;
use App\Models\Question2;
use App\Models\Question3;
use App\Models\Question4;
use App\Models\Question5;
use App\Models\Question6;
use App\Models\Question9;
use App\Models\Question10;
use App\Models\Question11;
use App\Models\Question12;
use App\Models\Question13;
use App\Models\Question14;
use App\Models\Question15;
use App\Models\Question16;
use App\Models\Question17;
class RecordsController extends Controller
{
    //
    public function index(Request $request)
    {
        $user = auth()->user();
        $selectedYear = $request->input('year');
        $perPage = $request->input('perPage', 7); // Default to 7 per page
        $search = $request->input('search');

        if ($user->role === 0) {
            $query = Household::orderBy('year', 'desc');
        } elseif ($user->role === 1) {
            $query = Household::where('user_id', $user->id)->orderBy('year', 'desc');
        }
    
        if ($selectedYear) {
            $query->where('year', $selectedYear);
        }
        

        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('household_code', 'like', '%' . $search . '%')
                  ->orWhere('barangay', 'like', '%' . $search . '%')
                  ->orWhere('purok', 'like', '%' . $search . '%')
                  ->orWhere('firstname', 'like', '%' . $search . '%')
                  ->orWhere('middlename', 'like', '%' . $search . '%')
                  ->orWhere('lastname', 'like', '%' . $search . '%');
            });
        }

        $households = $query->paginate($perPage);
    
        $households->appends(['year' => $selectedYear, 'perPage' => $perPage]);
    
        $availableYears = Household::distinct()->orderBy('year', 'desc')->pluck('year');
    
        $familyMemberCounts = [];
    
        foreach ($households as $household) {
            $familyMemberCount = FamilyMembers::where('household_id', $household->id)->count();
            
            $familyMemberCounts[$household->id] = $familyMemberCount;
        }

        return view('pages.records.records', compact('households', 'familyMemberCounts', 'availableYears', 'selectedYear', 'perPage', 'query'));
    }

    public function create()
    {
        return view('pages.records.create-records');
    }

    public function store(Request $request)
    {
        $customMessages = [
            'required' => 'The :attribute field is required.',
            'unique' => 'The :attribute has already been taken.',
            'numeric' => 'The :attribute. must be a number.',
        ];

        $request->validate([
            'household_code' => 'required',
            'year' => 'numeric|required',
            'tag_no' => 'numeric',
            'barangay',
            'purok',
            'firstname',
            'middlename',
            'lastname',
            'answer1',

            'answer1_q2',
            'answer2_q2',
            'answer3_q2',

            'answer1_q3',
            'answer2_q3',
            'answer3_q3',
            'answer4_q3',

            'answer1_q4',
            'answer2_q4',
            'answer3_q4',

            'answer1_q5',
            'answer2_q5',

            'answer1_q6',

            'question9.*.if_yes',
            'question9.*.answer1_q9',
            'question9.*.answer2_q9',
            'question9.*.answer3_q9',
            'question9.*.answer4_q9',

            'family_members.*.firstname',
            'family_members.*.middlename',
            'family_members.*.lastname',
            'family_members.*.birthdate',
            'family_members.*.relationship_to_head',
            'family_members.*.gender',
            'family_members.*.age',
            'family_members.*.civil_status',
            'family_members.*.solo_parent',

            'family_members.*.religion',
            'family_members.*.ibang_relihiyon',

            'family_members.*.studying',
            'family_members.*.has_job',
            'family_members.*.job',
            'family_members.*.known_work',

            'family_members.*.where',
            'family_members.*.iba_pa_saan',

            'family_members.*.sector',
            'family_members.*.iba_pa_sektor',

            'family_members.*.position',
            'family_members.*.monthly_income',
            'family_members.*.level_of_nutrition',

            'family_members.*.type_of_disability',
            'family_members.*.iba_pa_kapansanan',

            'question10.*answer1_q10',
            'question10.*answer2_q10',
            'question10.*answer3_q10',
            'question10.*answer4_q10',

            'answer1_q11',
            'answer2_q11',
            'answer3_q11',
            'answer4_q11',
            'answer5_q11',

            'answer1_q12',
            'answer2_q12',
            'answer3_q12',
            'answer4_q12',

            'answer1_q13',
            'answer2_q13',
            'answer3_q13',
            'answer4_q13',

            'answer1_q14',
            'answer2_q14',

            'answer1_q15',
            'answer2_q15',
            'answer3_q15',
            'answer4_q15',

            'answer1_q16',
            'answer2_q16',
            
            'answer1_q17',
            'answer2_q17',
            'answer3_q17',
        ], $customMessages);

        $household = new Household([
            'household_code' => $request->input('household_code'),
            'year' => $request->input('year'),
            'tag_no' => $request->input('tag_no'),
            'barangay' => $request->input('barangay'),
            'purok' => $request->input('purok'),
            'firstname' => $request->input('firstname'),
            'middlename' => $request->input('middlename'),
            'lastname' => $request->input('lastname'),
            'answer1' => $request->input('answer1'),
            'user_id' => auth()->user()->id,
        ]);
        $household->save();

        // Save family members
        $familyMembersData = $request->input('family_members');
        $familyMembers = [];
        if ($familyMembersData !== null) {
            foreach ($familyMembersData as $data) {
                $familyMember = new FamilyMembers($data);
                $familyMembers[] = $familyMember;
            }
        } else {
            // Handle the case where $familyMembersData is null
            // For example, provide a default value or show an error message.
        }
        $household->familyMembers()->saveMany($familyMembers);

        $question9Data = $request->input('question9');
        $question9Records = [];
        
        if ($question9Data !== null) {
            foreach ($question9Data as $data) {
                if (!empty($data['answer1_q9']) || !empty($data['answer2_q9']) || !empty($data['answer3_q9']) || !empty($data['answer4_q9'])) {
                    $question9Record = new Question9($data);
                    $question9Records[] = $question9Record;
                }
            }
        } else {
            // Handle the case where $familyMembersData is null
            // For example, provide a default value or show an error message.
        }
        $household->question9()->saveMany($question9Records);


        $question10Data = $request->input('question10');
        $question10Records = [];
        if ($question10Data !== null) {
            foreach ($question10Data as $data) {
                if (!empty($data['answer1_q10']) || !empty($data['answer2_q10']) || !empty($data['answer3_q10']) || !empty($data['answer4_q10'])) {
                    $question10Record = new Question10($data);
                    $question10Records[] = $question10Record;
                }
            }
        } else {
            // Handle the case where $familyMembersData is null
            // For example, provide a default value or show an error message.
        }
        
        $household->question10()->saveMany($question10Records);

        $questions = [
            ['model' => Question2::class, 'fields' => ['answer1_q2', 'answer2_q2', 'answer3_q2']],
            ['model' => Question3::class, 'fields' => ['answer1_q3', 'answer2_q3', 'answer3_q3', 'answer4_q3']],
            ['model' => Question4::class, 'fields' => ['answer1_q4', 'answer2_q4', 'answer3_q4']],
            ['model' => Question5::class, 'fields' => ['answer1_q5', 'answer2_q5']],
            ['model' => Question6::class, 'fields' => ['answer1_q6']],
            ['model' => Question11::class, 'fields' => ['answer1_q11', 'answer2_q11', 'answer3_q11', 'answer4_q11', 'answer5_q11']],
            ['model' => Question12::class, 'fields' => ['answer1_q12', 'answer2_q12', 'answer3_q12', 'answer4_q12']],
            ['model' => Question13::class, 'fields' => ['answer1_q13', 'answer2_q13', 'answer3_q13', 'answer4_q13']],
            ['model' => Question14::class, 'fields' => ['answer1_q14', 'answer2_q14']],
            ['model' => Question15::class, 'fields' => ['answer1_q15', 'answer2_q15', 'answer3_q15', 'answer4_q15']],
            ['model' => Question16::class, 'fields' => ['answer1_q16', 'answer2_q16']],
            ['model' => Question17::class, 'fields' => ['answer1_q17', 'answer2_q17', 'answer3_q17']],
            
        ];

        foreach ($questions as $question) {
            $model = new $question['model'];
            foreach ($question['fields'] as $field) {
                $model->$field = $request->input($field);
            }
            $model->household_id = $household->id;
            $model->save();
        }
        


        return redirect()->route('records')->with('success', 'Household added successfully.');
    }
    
    public function show($id)
    {
        $household = Household::findOrFail($id);
        $familyMembers = FamilyMembers::where('household_id', $household->id)->get();
    
        return view('pages.records.household-detail', compact('household', 'familyMembers'));
    }

    public function edit()
    {
        $households = Household::all();
        return view('pages.records.edit-records');
    }

    public function delete($id)
    {
        $household = Household::findOrFail($id);

        $household->delete();

        return redirect()->route('records')->with('delete', 'Record deleted successfully.');
    }
}
