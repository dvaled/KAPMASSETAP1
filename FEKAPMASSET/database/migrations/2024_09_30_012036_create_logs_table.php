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
        Schema::create('logs', function (Blueprint $table) {
            $table->id("LogID");
            $table->integer("AssetID");
            $table->integer("RoleID");
            $table->string('ActionPerformed');
            $table->string('UserAdded');
            $table->timestamp("DateAdded");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logs');
    }
};

// public int LogID{ get; set; }
// public int AssetID { get; set; }
// public int RoleID { get; set; }
// public required string ActionPerformed { get; set; }
// public required string UserAdded { get; set; }
// public DateOnly DateAdded { get; set; }  
