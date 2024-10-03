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
        Schema::create('TRN_HIST_ASSET', function (Blueprint $table) {
            $table->id("IDASSETHISTORY");
            $table->integer("IDASSET");
            $table->integer("NIPP");
            $table->String("NAME");
            $table->String("POSITION");
            $table->String("UNIT");
            $table->String("DEPARTMENT");
            $table->String("DIRECTORATE");
            $table->String("PICADDED");
            $table->timestamp("DATEADDED");
            $table->timestamp("DATEUPDATED");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRN_HIST_ASSET');
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