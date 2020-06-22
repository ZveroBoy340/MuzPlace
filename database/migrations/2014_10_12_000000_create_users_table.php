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
            $table->string('avatar')->nullable();
            $table->string('name');
            $table->string('lastname')->nullable();
            $table->string('login')->nullable();
            $table->date('birthday')->default($date);
            $table->string('gender')->nullable();
            $table->string('phone')->nullable();
            $table->text('about')->nullable();
            $table->string('status')->nullable();
            $table->string('facebook')->nullable();
            $table->string('vkontakte')->nullable();
            $table->string('odnoklassniki')->nullable();
            $table->string('instagram')->nullable();
            $table->string('telegram')->nullable();
            $table->string('twitter')->nullable();
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
