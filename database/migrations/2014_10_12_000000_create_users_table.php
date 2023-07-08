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
            $table->enum('type', ['buyer_owner','agent','builder']);
            $table->string('user_name')->unique();
            $table->string('name',150)->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('password');
            $table->bigInteger('phone')->nullable()->unique();
            $table->enum('is_verified', [1, 0])->default(0);
            $table->enum('is_blocked', [1, 0])->default(0);
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
