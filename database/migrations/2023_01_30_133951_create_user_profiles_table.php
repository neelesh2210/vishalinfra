<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('avatar')->nullable();
            $table->integer('level')->default(0);
            $table->string('aadhar_number')->nullable();
            $table->string('adhar_front')->nullable();
            $table->string('adhar_back')->nullable();
            $table->string('pan_front')->nullable();
            $table->string('pan_back')->nullable();
            $table->string('passbook_cheque')->nullable();
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
        Schema::dropIfExists('user_profiles');
    }
}
