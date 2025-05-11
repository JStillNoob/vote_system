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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id('candidate_id');
            $table->unsignedBigInteger('ElectionPosition_id');
            $table->unsignedBigInteger('user_id');
            $table->string('bio');
            $table->boolean('is_approve')->default(false);
            $table->timestamps();

            $table->foreign('ElectionPosition_id')->references('ElectionPosition_id')->on('election_positions')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('candidates', function (Blueprint $table) {
            $table->dropForeign(['ElectionPosition_id']);
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('candidates');
    }
};
