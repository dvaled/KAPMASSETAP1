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
        Schema::create('MST_USER', function (Blueprint $table) {
            $table->id("NIPP");
            $table->string('ROLEID');
            $table->integer('USER_PICTURE');
            $table->string('NAME');
            $table->string('POSITION');
            $table->string('UNIT');
            $table->string('DEPARTMENT');
            $table->string('DIRECTORATE');
            $table->string('PASSWORD');
            $table->string('ACTIVE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('MST_USER');
    }
};
