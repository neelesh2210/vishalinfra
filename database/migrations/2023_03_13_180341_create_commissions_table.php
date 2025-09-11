<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commissions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('installment_id');
            $table->bigInteger('user_id');
            $table->bigInteger('property_id');
            $table->double('commission_amount',15,2);
            $table->integer('level');
            $table->double('percentage',15,2);
            $table->enum('commission_type', ['active', 'passive']);
            $table->string('remark')->nullabel();
            $table->enum('is_confirm', ['1', '0'])->default('1');
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
        Schema::dropIfExists('commissions');
    }
}
