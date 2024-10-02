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
        Schema::create('TRN_DTL_SOFTWARE', function (Blueprint $table) {
            $table->id("IDASSETSOFTWARE");
            $table->integer("IDASSET");
            $table->string("SOFTWARETYPE");
            $table->string("SOFTWARECATEGORY");
            $table->string("SOFTWARENAME");
            $table->string("SOFTWARELICENSE");
            $table->string("INSTALLED_DATE");
            $table->string("PICADDED");
            $table->string("PICUPDATED");
            $table->string("ACTIVE");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('TRN_DTL_SOFTWARE');
    }
};
