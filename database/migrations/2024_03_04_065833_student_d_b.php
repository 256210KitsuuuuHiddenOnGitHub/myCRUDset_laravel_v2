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
        //Create Table Migration
        Schema::create('student_tables', function (Blueprint $db_table) {
            $db_table->bigIncrements('student_id');
            $db_table->string('name',100);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //Drop and Reverse Actions
        Schema::dropIfExists('student_tables');
    }
};
