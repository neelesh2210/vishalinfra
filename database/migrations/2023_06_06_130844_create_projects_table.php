<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('name');
            $table->string('cover_image')->nullable();
            $table->string('gallery_image')->nullable();
            $table->string('address')->nullable();
            $table->string('pincode')->nullable();
            $table->text('about')->nullable();
            $table->string('launch_date')->nullable();
            $table->string('completion_date')->nullable();
            $table->integer('total_unit')->nullable();
            $table->string('project_type')->nullable();
            $table->string('project_area')->nullable();
            $table->string('occupancy_certificated')->nullable();
            $table->string('commencement_certificated')->nullable();
            $table->text('why_buy')->nullable();
            $table->text('amenities')->nullable();
            $table->string('floor_plan')->nullable();
            $table->text('videos')->nullable();
            $table->enum('is_active', ['1', '0'])->default('1');
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
        Schema::dropIfExists('projects');
    }
}
