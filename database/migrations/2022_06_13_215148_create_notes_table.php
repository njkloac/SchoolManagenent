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
        Schema::dropIfExists('notes');
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('code_eleve');
            $table->string('code_elm');
            $table->string('module');
            $table->string('note');
            $table->foreign('code_eleve')->references('code')->on('eleve');
            $table->foreign('code_elm')->references('code')->on('element_module');
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
        Schema::dropIfExists('notes');
    }
};
