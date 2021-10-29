<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralFacilityInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_facility_info', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_of_health_unit_id');
            $table->string('type_of_health_unit_specified')->nullable();
            $table->unsignedBigInteger('authority_responsible_id')->nullable();
            $table->string('authority_responsible_specified')->nullable();
            $table->date('starting_operation_date');
            $table->unsignedBigInteger('user_id')->nullable();
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
        Schema::dropIfExists('general_facility_info');
    }
}
