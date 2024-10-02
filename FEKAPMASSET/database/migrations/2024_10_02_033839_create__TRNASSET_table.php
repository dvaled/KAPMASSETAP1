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
        Schema::create('TRN_ASSET', function (Blueprint $table) {
            $table->id("IDASSET");
            $table->integer("NIPP");
            $table->string("ASSETBRAND");
            $table->string("ASSETMODEL");
            $table->string("ASSETSERIES");
            $table->string("ASSETSERIALNUMBER");
            $table->string("ACTIVE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRN_ASSET');
    }
};
