<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    // You can define the table name explicitly if it's not plural
    protected $table = 'students';
    
    // If your table has different primary key, specify it here
    protected $primaryKey = 'id'; 

    // Define which attributes are mass assignable
    protected $fillable = [
        'roll_no', 'pr_no', 'name', 'ph_no', 'email', 'address',
        'school_10th_name', 'school_10th_address', 'school_10th_percentage',
        'school_12th_name', 'school_12th_address', 'school_12th_percentage',
        'bachelor_college_name', 'bachelor_college_address', 'bachelor_percentage',
        'current_status', 'final_year_passed', 'users_email'
    ];}