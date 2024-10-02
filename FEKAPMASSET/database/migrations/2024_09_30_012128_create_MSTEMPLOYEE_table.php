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
        Schema::create('MST_EMPLOYEE', function (Blueprint $table) {
            $table->id('NIPP')-> unique();
            $table->string('NAME');
            $table->string('POSITION');
            $table->string('UNIT');
            $table->string('DEPARTMENT');
            $table->string('DIRECTORATE');
            $table->string('ACTIVE');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MST_EMPLOYEE');
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
