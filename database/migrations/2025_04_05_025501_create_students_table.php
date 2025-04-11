<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Drop if exists
        Schema::dropIfExists('students');

        // Create students table using raw SQL
        DB::statement("
            CREATE TABLE students (
                id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                roll_no VARCHAR(255) UNIQUE,
                pr_no VARCHAR(255) UNIQUE,
                name VARCHAR(255),
                ph_no VARCHAR(255),
                email VARCHAR(255) UNIQUE,
                address TEXT,

                school_10th_name VARCHAR(255),
                school_10th_address TEXT,
                school_10th_percentage DECIMAL(5,2),

                school_12th_name VARCHAR(255),
                school_12th_address TEXT,
                school_12th_percentage DECIMAL(5,2),

                bachelor_college_name VARCHAR(255),
                bachelor_college_address TEXT,
                bachelor_percentage DECIMAL(5,2),

                current_course VARCHAR(255),
                current_status VARCHAR(255),
                final_year_passed VARCHAR(255),

                users_email VARCHAR(255),
                created_at TIMESTAMP NULL DEFAULT NULL,
                updated_at TIMESTAMP NULL DEFAULT NULL,

                INDEX idx_users_email (users_email),
                CONSTRAINT fk_students_email FOREIGN KEY (users_email) REFERENCES users(email) ON DELETE CASCADE
            );
        ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        Schema::dropIfExists('students');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
    
};
