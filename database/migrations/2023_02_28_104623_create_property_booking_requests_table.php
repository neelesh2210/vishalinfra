<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyBookingRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_booking_requests', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('property_id');
            $table->double('token_amount',8,2);
            $table->bigInteger('user_id');
            $table->enum('request_status', ['confirm', 'cancel', 'pending'])->default('pending');
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
        Schema::dropIfExists('property_booking_requests');
    }
}
