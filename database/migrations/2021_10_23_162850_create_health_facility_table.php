<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facility', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name');
            $table->string('reg_no');
            $table->unsignedBigInteger('doctor_incharge_id');
            $table->string('street');
            $table->string('address');
            $table->string('village');
            $table->string('ward');
            $table->string('po_box');
            $table->unsignedBigInteger('district_id');
            $table->string('region');
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('health_facility');
    }
}
