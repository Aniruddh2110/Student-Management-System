<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
{
    DB::statement("DROP TABLE IF EXISTS student_talk");

    DB::statement("
        CREATE TABLE student_talk (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            student_id BIGINT UNSIGNED,
            talk_id BIGINT UNSIGNED,
            created_at TIMESTAMP NULL DEFAULT NULL,
            updated_at TIMESTAMP NULL DEFAULT NULL,

            CONSTRAINT student_talk_student_id_foreign FOREIGN KEY (student_id) REFERENCES students(id) ON DELETE CASCADE,
            CONSTRAINT student_talk_talk_id_foreign FOREIGN KEY (talk_id) REFERENCES talks(id) ON DELETE CASCADE
        );
    ");
}
};
