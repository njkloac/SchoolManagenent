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
        Schema::create('moyennes', function (Blueprint $table) {
            $table->id();
            $table->string('code_eleve');
            $table->string('code_fil');
            $table->string('niveau');
            $table->string('moyenne');
            $table->foreign('code_eleve')->references('code')->on('eleve');
            $table->foreign('code_fil')->references('code')->on('filiere');
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
        Schema::dropIfExists('moyennes');
    }
};
