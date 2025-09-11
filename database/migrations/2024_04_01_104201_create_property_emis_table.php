<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertyEmisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_emis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('booking_id');
            $table->date('emi_date');
            $table->double('emi_amount',15,2);
            $table->double('discount_amount',15,2)->default(0.00);
            $table->double('final_amount',15,2);
            $table->double('due_amount',15,2)->default(0.00);
            $table->longText('installment_detail')->nullable();
            $table->longText('discount_detail')->nullable();
            $table->longText('due_detail')->nullable();
            $table->enum('paid_status', ['1', '0'])->default('0');
            $table->enum('status', ['pending', 'success', 'cancel'])->default('pending');
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
        Schema::dropIfExists('property_emis');
    }
}
