<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingPartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_parts', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->timestamps();
        });

        Schema::create('building_parts_state', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('building_part_id');
            $table->timestamps();
        });

        Schema::create('building_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building_parts_id');
            $table->unsignedBigInteger('health_facility_id');
            $table->text('comments');
            $table->enum('state', ['good', 'average', 'bad']);
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
        Schema::dropIfExists('building_parts');
        Schema::dropIfExists('building_parts_state');
        Schema::dropIfExists('building_status');
    }
}
