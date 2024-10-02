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
        Schema::create('MST_GCM', function (Blueprint $table) {
            $table->id("MASTERID");
            $table->string('CONDITION');
            $table->integer('NOSR');
            $table->string('DESCRIPTION');
            $table->string('VALUEGCM');
            $table->string('TYPEGCM');
            $table->string('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MST_GCM');
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