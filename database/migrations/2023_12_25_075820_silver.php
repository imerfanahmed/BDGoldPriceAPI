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
        Schema::create('silvers', function (Blueprint $table) {
            $table->id();
            $table->string('k18')->nullable();
            $table->string('k21')->nullable();
            $table->string('k22')->nullable();
            $table->string('traditional')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
