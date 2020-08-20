<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->unsignedTinyInteger('publicstatus')->default(0);
            $table->rememberToken();
            $table->timestamps();
        });

        $user = new \App\User();
        $user->name = 'Justin Wenner';
        $user->email = 'justinwenner@outlook.de';
        $user->password = bcrypt('justinwenner');
        $user->save();

        $user = new \App\User();
        $user->name = 'Privat User';
        $user->email = 'privatuser@justinwenner.de';
        $user->password = bcrypt('gastuser');
        $user->save();

        $user = new \App\User();
        $user->name = 'Testuser';
        $user->email = 'testuser@justinwenner.de';
        $user->password = bcrypt('gastuser');
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
}
