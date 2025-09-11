<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->id();
            $table->integer('booking_id');
            $table->double('amount',15,2);
            $table->double('discount_amount',15,2)->default('0');
            $table->double('final_amount',15,2);
            $table->integer('taken_by');
            $table->enum('taken_by_type',['admin','associate','customer']);
            $table->text('reference_id')->nullable();
            $table->text('payment_detail')->nullable();
            $table->text('remark')->nullable();
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
        Schema::dropIfExists('installments');
    }
}
