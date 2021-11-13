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
            $table->string('reg_no')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('doctor_incharge_id')->nullable();
            $table->unsignedBigInteger('location_id')->nullable();
            $table->timestamps();
        });

        Schema::create('owner_health_facility', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('health_facility_id');
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
        Schema::dropIfExists('owner_health_facility');
    }
}
