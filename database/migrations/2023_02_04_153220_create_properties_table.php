<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->bigInteger('added_by');
            $table->bigInteger('project_id');
            $table->bigInteger('property_number');
            $table->string('name');
            $table->string('properties_type');
            $table->string('furnished_status')->nullable();
            $table->string('transaction_type');
            $table->string('prossession_status');
            $table->integer('bedroom')->nullable();
            $table->integer('bathroom')->nullable();
            $table->integer('balconies')->nullable();
            $table->string('floor_no')->nullable();
            $table->integer('total_floor')->nullable();
            $table->double('carpet_area',8,2)->nullable();
            $table->double('super_area',8,2)->nullable();
            $table->string('self_tieup')->nullable();
            $table->string('plot_type')->nullable();
            $table->bigInteger('phase_id')->nullable();
            $table->bigInteger('plot_number')->nullable();
            $table->string('facing')->nullable();
            $table->text('featuers')->nullable();
            $table->double('plot_area',8,2)->nullable();
            $table->double('plot_length',8,2)->nullable();
            $table->double('plot_breadth',8,2)->nullable();
            $table->double('expected_price',15,2)->nullable();
            $table->double('price',15,2)->nullable();
            $table->double('booking_amount',15,2)->nullable();
            $table->double('maintenance_charge',15,2)->nullable();
            $table->double('token_money',15,2)->nullable();
            $table->double('base_price',15,2)->nullable();
            $table->double('agent_price',15,2)->nullable();
            $table->double('final_price',15,2)->nullable();
            $table->double('commission',15,2)->nullable();
            $table->double('prize',15,2)->nullable();
            $table->string('photos')->nullable();
            $table->string('thumbnail_img')->nullable();
            $table->string('remark')->nullable();
            $table->enum('booking_status', ['available', 'booked', 'reserved', 'on_hold', 'not_available'])->default('available');
            $table->enum('is_status', ['1','0'])->default('1');
            $table->enum('is_delete', ['1','0'])->default('0');
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
        Schema::dropIfExists('properties');
    }
}
