<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SyncController extends Controller
{
    public function getFromMainDB(){
    $mainStudents = DB::connection('mysql2')->table('master_student')->get();

    foreach ($mainStudents as $student) {
        DB::table('students')->updateOrInsert(
            ['pr_no' => $student->pr_no], // 🔁 Match by PR number
            [
                'roll_no' => $student->roll_no,
                'pr_no' => $student->pr_no, // still needed for insert
                'name' => $student->name,
                'ph_no' => $student->ph_no,
                'email' => $student->email,
                'address' => $student->address,
        
                'school_10th_name' => $student->school_10th_name,
                'school_10th_address' => $student->school_10th_address,
                'school_10th_percentage' => $student->school_10th_percentage,
        
                'school_12th_name' => $student->school_12th_name,
                'school_12th_address' => $student->school_12th_address,
                'school_12th_percentage' => $student->school_12th_percentage,
        
                'bachelor_college_name' => $student->bachelor_college_name,
                'bachelor_college_address' => $student->bachelor_college_address,
                'bachelor_percentage' => $student->bachelor_percentage,
        
                'current_course' => $student->course,
                'current_status' => $student->current_status,
                'final_year_passed' => $student->final_year_passed,
        
                
        
                'updated_at' => now(),
                'created_at' => $student->created_at ?? now(),
            ]
        );
    }
    return redirect()->back()->with('success', 'Successfully synced from main DB!');


    }
}
