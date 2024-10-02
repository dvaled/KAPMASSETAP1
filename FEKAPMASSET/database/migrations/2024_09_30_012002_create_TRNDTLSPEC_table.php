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
        Schema::create('TRN_DTL_SPEC', function (Blueprint $table) {
            $table->id("ID_ASSET_SPEC");
            $table->integer("ID_ASSET");
            $table->string("PROCESSORBRAND");
            $table->string("PROCESSORMODEL");
            $table->string("PROCESSORSERIES");
            $table->string("MEMORYTYPE");
            $table->string("MEMORYBTAND");
            $table->string("MEMORYMODEL");
            $table->string("MEMORYSERIES");
            $table->string("MEMORYCAPACITY");
            $table->string("STORAGETYPE");
            $table->string("STORAGEBRAND");
            $table->string("STORAGEMODEL");
            $table->string("STORAGESERIES");
            $table->string("STORAGECAPACITY");
            $table->string("GRAPHICSTYPE");
            $table->string("GRAPHICSBRAND");
            $table->string("GRAPHICSMODEL");
            $table->string("GRAPHICSERIES");
            $table->string("GRAPHICSCAPACITY");
            $table->string("SCREENRESOLUTION");
            $table->boolean("TOUCHSCREEN");
            $table->boolean("BACKLIGHTKEYBOARD");
            $table->boolean("CONVERTIBLE");
            $table->boolean("WEBCAMERA");
            $table->boolean("SPEAKER");
            $table->boolean("MICROPHONE");
            $table->boolean("WIFI");
            $table->boolean("BLUETOOTH");  
            $table->string("USER_ADDED");  
            $table->string("USER_UPDATED");  


                      
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hardware');
    }
};

//     // Navigation property
//     [ForeignKey("NIPP")]
//     public required EmployeeModel Employee { get; set; } 
