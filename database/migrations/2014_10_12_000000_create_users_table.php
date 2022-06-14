<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('utilisateur', function (Blueprint $table) {
            $table->id();
            $table->string('login');
            $table->string('password');
            $table->string('email')->nullabe();
            $table->string('type');
            $table->timestamps();
        });
        $user=new User();
        $user->login='admin';
        $user->password='admin';
        $user->email='admin@gmail.com';
        $user->type='Admin';
        $user->save();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
