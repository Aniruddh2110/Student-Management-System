<?php
namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Laravel\Fortify\Contracts\CreatesNewUsers;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
    {
        // Validate input data
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),

            'roll_no' => ['required', 'string'],
            'pr_no' => ['required', 'string'],
            'ph_no' => ['required', 'string'],
            'address' => ['required', 'string'],

            'school_10th_name' => ['required', 'string'],
            'school_10th_address' => ['required', 'string'],
            'school_10th_percentage' => ['required', 'numeric'],

            'school_12th_name' => ['required', 'string'],
            'school_12th_address' => ['required', 'string'],
            'school_12th_percentage' => ['required', 'numeric'],

            'bachelor_college_name' => ['required', 'string'],
            'bachelor_college_address' => ['required', 'string'],
            'bachelor_percentage' => ['required', 'numeric'],

            'current_course' => ['required', 'string'],
            'current_status' => ['required', 'string'],
            'final_year_passed' => ['required', 'string'],
        ])->validate();

        // Create the user in the 'users' table
        $user = User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'role' => 'student', // Default role is 'student'
        ]);

        // Insert the student-specific data into the 'students' table
        DB::insert("INSERT INTO students (
            roll_no, pr_no, name, ph_no, email, address, 
            school_10th_name, school_10th_address, school_10th_percentage, 
            school_12th_name, school_12th_address, school_12th_percentage, 
            bachelor_college_name, bachelor_college_address, bachelor_percentage, 
            current_course, current_status, final_year_passed, created_at, updated_at
        ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())", [
            $input['roll_no'],
            $input['pr_no'],
            $input['name'],
            $input['ph_no'],
            $input['email'],
            $input['address'],
            $input['school_10th_name'],
            $input['school_10th_address'],
            $input['school_10th_percentage'],
            $input['school_12th_name'],
            $input['school_12th_address'],
            $input['school_12th_percentage'],
            $input['bachelor_college_name'],
            $input['bachelor_college_address'],
            $input['bachelor_percentage'],
            $input['current_course'],
            $input['current_status'],
            $input['final_year_passed'],
        ]);

        return $user;
    }
}
