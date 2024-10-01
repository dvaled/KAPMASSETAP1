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
        Schema::create('types', function (Blueprint $table) {
            $table->id("MasterID");
            $table->string('Condition');
            $table->integer('NoSr');
            $table->string('Description');
            $table->string('ValueGcm');
            $table->string('Type_Gcm');
            $table->string('Active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};

// public int MasterID{ get; set; }
// public required string Condition { get; set; }
// public required int NoSr { get; set; }
// public required string Description { get; set; }
// public required int ValueGcm { get; set; }
// public required string TypeGcm { get; set; }
// public required string Active { get; set; }
// }