<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('positions', function (Blueprint $table) {
            $table->id('position_id');
            $table->string('title', 100);
          
            

        });
    }

    public function down()
    {
        Schema::dropIfExists('positions');
    }
};