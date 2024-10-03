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
        Schema::create('TRN_DTL_PIC', function (Blueprint $table) {
            $table->id("IDASSET");
            $table->integer("IDASSETPIC");
            $table->string("ASSETPIC");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRN_DTL_PIC');
    }
};
