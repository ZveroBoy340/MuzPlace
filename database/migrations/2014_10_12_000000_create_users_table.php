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
            $date = "0000-00-00";
            $table->id();
            $table->string('avatar');
            $table->string('name');
            $table->string('lastname');
            $table->string('login');
            $table->date('birthday')->default($date);
            $table->string('gender');
            $table->string('phone');
            $table->text('about');
            $table->string('status');
            $table->string('facebook');
            $table->string('vkontakte');
            $table->string('odnoklassniki');
            $table->string('instagram');
            $table->string('telegram');
            $table->string('twitter');
            $table->string('status');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
