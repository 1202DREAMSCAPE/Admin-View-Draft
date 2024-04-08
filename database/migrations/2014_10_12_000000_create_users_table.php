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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('SNum')->unsigned()->unique(); // Student number, unique and not null
            $table->string('Gender', 15)->nullable(false); // Gender, not null
            $table->string('LName', 50)->nullable(false); // Last Name, not null
            $table->string('FName', 50)->nullable(false); // First Name, not null
            $table->string('MName', 50)->nullable(); // Middle Name, nullable
            $table->string('NameExt', 10)->nullable(); // Name Extension, nullable
            $table->string('MaidenName', 50)->nullable(); // Maiden Name, nullable
            $table->string('Dept', 50)->nullable(false); // Department, not null
            $table->string('Course', 100)->nullable(false); // Course, not null
            $table->date('BDay')->nullable(false); // Birthdate, not null
            $table->year('Graduated')->nullable(false); // Year Graduated, not null
            $table->string('POB', 50)->nullable(false); // Place of Birth, not null
            $table->integer('ContactNum')->unsigned()->unique(); // Contact Number, unique and not null
            $table->integer('TelNum')->unsigned()->nullable()->unique(); // Telephone Number, unique and nullable
            $table->string('EmailAdd', 50)->unique(); // Email Address, unique and not null
            $table->string('Linkedin', 255)->nullable(); // LinkedIn, nullable
            $table->string('Nationality', 50)->nullable(false); // Nationality, not null
            $table->string('CivilStat', 50)->nullable(false); // Civil Status, not null
            $table->string('Address', 100)->nullable(false); // Address, not null
            $table->string('Country', 50)->nullable(false); // Country, not null
            $table->string('Province', 50)->nullable(); // Province, nullable
            $table->string('Region', 10)->nullable(); // Region, nullable
            $table->string('City', 50)->nullable(false); // City, not null
            $table->integer('PostalCode')->unsigned()->nullable(false); // Postal Code, not null
            $table->text('Skills')->nullable(); // Skills, nullable
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
