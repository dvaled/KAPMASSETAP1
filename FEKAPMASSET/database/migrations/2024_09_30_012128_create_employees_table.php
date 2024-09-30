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
        Schema::create('employees', function (Blueprint $table) {
            $table->id('NIPP')-> unique();
            $table->string('Name');
            $table->string('Position');
            $table->string('Unit');
            $table->string('Department');
            $table->string('Directorate');
            $table->string('Password');
            $table->string('Active');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};

// public int NIPP { get; set; }
// public required string Name { get; set; }
// public required string Position { get; set; }
// public required string Unit { get; set; }
// public required string Department { get; set; }
// public required string Directorate { get; set; }
// public required string Password { get; set; }
// public required string Active { get; set; }
