<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilityWasteDisposalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facility_waste_disposal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_facility_id');
            $table->enum('surrounding_status', ['Clean', 'Dirty']);
            $table->enum('waste_bin', ['None', 'Present']);
            $table->enum('dumping_site', ['None', 'Dirty', 'Cared for and clean']);
            $table->enum('incinerator', ['None', 'Not functioning', 'Functioning']);
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
        Schema::dropIfExists('health_facility_waste_disposal');
    }
}
