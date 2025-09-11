<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payouts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->double('amount',15,2);
            $table->double('service_charge',15,2);
            $table->double('tds_charge',15,2);
            $table->double('final_amount',15,2);
            $table->enum('payment_type', ['cash', 'online', 'check']);
            $table->text('payment_detail')->nullable();
            $table->text('remark')->nullable();
            $table->enum('payment_status', ['success', 'failed', 'pending']);
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
        Schema::dropIfExists('payouts');
    }
}
