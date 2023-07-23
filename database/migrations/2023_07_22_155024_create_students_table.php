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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); 
            $table->integer("teacher_id");
            $table->string("name", 120);
            $table->string("email", 50)->nullable();
            $table->string("mobile", 50)->nullable();
            $table->integer("age");
            $table->string("gender", ["male", "female", "others"]);
            $table->text("address_info");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
