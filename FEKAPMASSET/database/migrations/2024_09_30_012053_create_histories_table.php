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
        Schema::create('histories', function (Blueprint $table) {
            $table->id();
            $table->integer("NIPP");
            $table->String("Name");
            $table->String("Position");
            $table->String("Unit");
            $table->String("Department");
            $table->String("Directorate");
            $table->String("PICAdded");
            $table->timestamp("DateAded");
            $table->timestamp("DateUpdated");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('histories');
    }
};

// public int IdAssetHistory { get; set; }
// public int IdAsset { get; set; }
// public int NIPP { get; set; }
// public required string Name { get; set; }
// public required string Position { get; set; }
// public required string Unit { get; set; }
// public required string Department { get; set; }
// public required string Directorate { get; set; }
// public required string PICAdded { get; set; }
// public DateOnly DateAdded { get; set; }
// public DateOnly DateUpdated { get; set; }
// }