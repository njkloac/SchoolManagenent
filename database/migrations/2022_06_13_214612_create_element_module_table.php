<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('element_module', function (Blueprint $table) {
            $table->id();
           
            $table->string('code')->unique();
            $table->string('designation');
            $table->string('VH');
            $table->string('poids');
            $table->string('code_module');
            
            $table->foreign('code_module')->references('code')->on('module');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('element_module');
    }
};
