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
            $table->string('18k')->nullable();
            $table->string('21k')->nullable();
            $table->string('22k')->nullable();
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
