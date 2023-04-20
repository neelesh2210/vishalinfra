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
            $table->bigInteger('added_by')->default(0);
            $table->enum('type', ['customer','associate']);
            $table->string('name',150)->nullable();
            $table->bigInteger('phone')->unique();
            $table->string('email')->nullable();
            $table->string('referrer_code');
            $table->string('referral_code')->nullable();
            $table->string('password');
            $table->enum('is_verified', [1, 0])->default(0);
            $table->enum('is_kyced', [1, 0])->default(0);
            $table->enum('is_delete', [1, 0])->default(0);
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
