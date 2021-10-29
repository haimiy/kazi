<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryHealthFacilityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_health_facility', function (Blueprint $table) {
            $table->id();
            $table->string('facility_name');
            $table->string('reg_no');
            $table->string('district_name');
            $table->string('type_of_health_unit');
            $table->date('starting_operation_date');
            $table->string('full_name');
            $table->string('phone_no');
            $table->string('location');
            $table->string('service_name');
            $table->string('doctor_incharge_name');
            $table->string('qualification');
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
        Schema::dropIfExists('history_health_facility');
    }
}
