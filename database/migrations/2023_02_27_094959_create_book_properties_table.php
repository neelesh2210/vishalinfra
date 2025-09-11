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
            $table->string('book_property_id')->unique();
            $table->bigInteger('property_id');
            $table->string('customer_name')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('customer_phone')->nullable();
            $table->integer('booked_by')->nullable();
            $table->double('emi_charge',15,2)->nullable();
            $table->enum('booked_type', ['admin', 'associate', 'customer']);
            $table->enum('booking_status', ['on_hold', 'reserved', 'booked', 'registred', 'cancel', 'emi', 'sold', 'refunded']);
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
