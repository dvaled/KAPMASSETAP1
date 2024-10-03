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
        Schema::create('TRN_LOG', function (Blueprint $table) {
            $table->id("LOGID");
            $table->integer("ASSETID");
            $table->integer("ROLEID");
            $table->string('ACTIONPERFORMED');
            $table->string('USERADDED');
            $table->timestamp("DATEADDED");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRN_LOG');
    }
};

// public int LogID{ get; set; }
// public int AssetID { get; set; }
// public int RoleID { get; set; }
// public required string ActionPerformed { get; set; }
// public required string UserAdded { get; set; }
// public DateOnly DateAdded { get; set; }  
