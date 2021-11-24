<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilityWaterSupplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facility_water_supply', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_facility_id');
            $table->enum('is_water_adequate',['Yes','No']);
            $table->enum('is_water_available_for_drink',['None','Not boiled','Yes']);
            $table->string('source_of_water');
            $table->timestamps();
        });

        Schema::create('type_of_water_supply', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('health_facility_water_supply');
        Schema::dropIfExists('type_of_water_supply');
    }
}
