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
        Schema::create('election_positions', function (Blueprint $table) {
            $table->id('ElectionPosition_id');
            $table->unsignedBigInteger('election_id');
            $table->unsignedBigInteger('position_id');
            $table->text('description')->nullable();
            
            $table->foreign('election_id')->references('election_id')->on('elections')->onDelete('cascade');
            $table->foreign('position_id')->references('position_id')->on('positions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('election_positions', function (Blueprint $table) {
            $table->dropForeign(['election_id']);
            $table->dropForeign(['position_id']);
        });
        Schema::dropIfExists('election_positions');
    }
};
