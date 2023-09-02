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
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
//            $table->string('name');
            $table->foreignId('company_id')->constrained();
            $table->boolean('is_active');
            $table->enum('name', ['SUPER_ADMIN','SUPER_DIRECTOR','DIRECTOR','MANAGER','TEACHER','STUDENT'])->default('STUDENT');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
