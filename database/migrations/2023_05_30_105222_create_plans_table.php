<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plans', function (Blueprint $table) {
            $table->id();
            $table->integer('priority');
            $table->string('slug');
            $table->string('name');
            $table->double('price',15,2);
            $table->double('discounted_price',15,2);
            $table->integer('number_of_property');
            $table->integer('duration_in_day');
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->enum('buyer_notification', ['1', '0']);
            $table->enum('top_listing', ['1', '0']);
            $table->enum('trust_seal', ['1', '0']);
            $table->enum('verified_enquiry', ['1', '0']);
            $table->enum('classified', ['1', '0']);
            $table->enum('search_banner', ['1', '0']);
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
        Schema::dropIfExists('plans');
    }
}
