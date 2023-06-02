<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlanPurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plan_purchases', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('plan_id');
            $table->bigInteger('number_of_property');
            $table->bigInteger('duration_in_day');
            $table->double('price',15,2);
            $table->double('discounted_price',15,2);
            $table->text('payment_detail');
            $table->enum('payment_status', ['success', 'pending', 'failed']);
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
        Schema::dropIfExists('plan_purchases');
    }
}
