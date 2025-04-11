<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dashboard()
{
    // Fetch all students and talks from the database
    $students = DB::select("SELECT * FROM students");
    $talks = DB::select("SELECT * FROM talks");

    // Pass both to the view
    return view('admin.dashboard', compact('students', 'talks'));
}
}
