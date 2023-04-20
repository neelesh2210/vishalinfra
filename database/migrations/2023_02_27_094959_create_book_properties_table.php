<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookPropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_properties', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id');
            $table->double('token_amount',8,2);
            $table->bigInteger('user_id');
            $table->bigInteger('staff_id')->nullable();
            $table->enum('payment_type', ['online', 'wallet'])->default('wallet');
            $table->text('payment_detail')->nullable();
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
        Schema::dropIfExists('book_properties');
    }
}
