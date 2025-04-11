<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Student;

class StudentController extends Controller
{
    // Show all students
    public function index(Request $request)
    {
        $search = $request->input('search');
    
        if ($search) {
            $students = DB::select("
                SELECT * FROM students 
                WHERE pr_no LIKE ? 
                   OR name LIKE ? 
                   OR current_course LIKE ? 
                   OR email LIKE ?", 
                ["%$search%", "%$search%", "%$search%", "%$search%"]
            );
        } else {
            $students = DB::select("SELECT * FROM students");
        }
    
        return view('student.index', compact('students', 'search'));
    }
    

    public function dashboard()
    {
        try {
            $talks = DB::select("SELECT * FROM talks ORDER BY date ASC");
    
            $student = Student::where('email', Auth::user()->email)->firstOrFail();
    
            return view('student.dashboard', compact('talks','student'));
    
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return redirect()->route('student.create')->with('error', 'Student profile not found for this email.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong: ' . $e->getMessage());
        }
    }
    

    // Show create form
    public function create()
    {
        return view('student.create');
    }

    // Store student
    public function store(Request $request)
    {
        $validated = $request->validate([
            'roll_no' => 'required|string|unique:students',
            'pr_no' => 'required|string|unique:students',
            'name' => 'required|string',
            'ph_no' => 'required|string',
            'email' => 'required|email|unique:students',
            'address' => 'required|string',
            'school_10th_name' => 'required|string',
            'school_10th_address' => 'required|string',
            'school_10th_percentage' => 'required|numeric|between:0,100',
            'school_12th_name' => 'required|string',
            'school_12th_address' => 'required|string',
            'school_12th_percentage' => 'required|numeric|between:0,100',
            'bachelor_college_name' => 'required|string',
            'bachelor_college_address' => 'required|string',
            'bachelor_percentage' => 'required|numeric|between:0,100',
            'current_course' => 'required|string',
            'current_status' => 'required|string',
            'final_year_passed' => 'required|string',
        ]);
    
        try {
            DB::insert("INSERT INTO students (
                roll_no, pr_no, name, ph_no, email, address, 
                school_10th_name, school_10th_address, school_10th_percentage, 
                school_12th_name, school_12th_address, school_12th_percentage, 
                bachelor_college_name, bachelor_college_address, bachelor_percentage, 
                current_course, current_status, final_year_passed, created_at, updated_at
            ) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW())", [
                $validated['roll_no'],
                $validated['pr_no'],
                $validated['name'],
                $validated['ph_no'],
                Auth::user()->email, // <- overrides the email from form for security
                $validated['address'],
                $validated['school_10th_name'],
                $validated['school_10th_address'],
                $validated['school_10th_percentage'],
                $validated['school_12th_name'],
                $validated['school_12th_address'],
                $validated['school_12th_percentage'],
                $validated['bachelor_college_name'],
                $validated['bachelor_college_address'],
                $validated['bachelor_percentage'],
                $validated['current_course'],
                $validated['current_status'],
                $validated['final_year_passed'],
            ]);
    
            return redirect()->route('student.index')->with('success', 'Student added!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Something went wrong: ' . $e->getMessage()]);
        }
    }
    


    // Show edit form
    public function edit($id)
    {
        $student = DB::selectOne("SELECT * FROM students WHERE id = ?", [$id]);
        return view('student.edit', compact('student'));
    }

    // Update student
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'roll_no' => 'required|string|unique:students,roll_no,' . $id,
            'pr_no' => 'required|string|unique:students,pr_no,' . $id,
            'name' => 'required|string',
            'ph_no' => 'required|string',
            'email' => 'required|email|unique:students,email,' . $id,
            'address' => 'required|string',
            'school_10th_name' => 'required|string',
            'school_10th_address' => 'required|string',
            'school_10th_percentage' => 'required|numeric|between:0,100',
            'school_12th_name' => 'required|string',
            'school_12th_address' => 'required|string',
            'school_12th_percentage' => 'required|numeric|between:0,100',
            'bachelor_college_name' => 'required|string',
            'bachelor_college_address' => 'required|string',
            'bachelor_percentage' => 'required|numeric|between:0,100',
            'current_course' => 'required|string',
            'current_status' => 'required|string',
            'final_year_passed' => 'required|string',
        ]);
    
        try {
            DB::update("UPDATE students SET 
                roll_no = ?, pr_no = ?, name = ?, ph_no = ?, email = ?, address = ?, 
                school_10th_name = ?, school_10th_address = ?, school_10th_percentage = ?, 
                school_12th_name = ?, school_12th_address = ?, school_12th_percentage = ?, 
                bachelor_college_name = ?, bachelor_college_address = ?, bachelor_percentage = ?, 
                current_course = ?, current_status = ?, final_year_passed = ?, updated_at = NOW()
                WHERE id = ?", [
                    $validated['roll_no'],
                    $validated['pr_no'],
                    $validated['name'],
                    $validated['ph_no'],
                    $validated['email'],
                    $validated['address'],
                    $validated['school_10th_name'],
                    $validated['school_10th_address'],
                    $validated['school_10th_percentage'],
                    $validated['school_12th_name'],
                    $validated['school_12th_address'],
                    $validated['school_12th_percentage'],
                    $validated['bachelor_college_name'],
                    $validated['bachelor_college_address'],
                    $validated['bachelor_percentage'],
                    $validated['current_course'],
                    $validated['current_status'],
                    $validated['final_year_passed'],
                    $id,
            ]);
    
            return redirect()->route('student.index')->with('success', 'Student updated!');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Update failed: ' . $e->getMessage()]);
        }
    }
    

    // Delete student
    public function destroy($id)
    {
        DB::delete("DELETE FROM students WHERE id = ?", [$id]);
        return redirect()->route('student.index')->with('success', 'Student deleted!');
    }
}
