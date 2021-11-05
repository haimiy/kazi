<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilityToiletSanitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facility_toilet_sanitation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_facility_id');
            $table->enum('type_of_toilet', ['None', 'Flush', 'Pit latrine']);
            $table->enum('toilet_for_group', ['Patient', 'Staff', 'Both']);
            $table->enum('toilet_for_gender', ['Male', 'Female', 'Both']);
            $table->enum('state_of_toilets', ['clean', 'Dirty', 'Not in use']);
            $table->enum('sewage_system', ['Non', 'Not functioning', 'Leaking over flowing']);
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
        Schema::dropIfExists('health_facility_toilet_sanitation');
    }
}
