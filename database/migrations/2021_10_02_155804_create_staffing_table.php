<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStaffingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_occupation_id');
            $table->unsignedInteger('no_of_full_time')->default(0);
            $table->unsignedInteger('no_of_part_time')->default(0);
            $table->unsignedBigInteger('health_facility_id');
            $table->boolean('is_specified')->default(false);
            $table->string('specified_occupation')->nullable();
            $table->timestamps();
        });

        Schema::create('occupation', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
            $table->boolean('is_specified')->default(false);
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
        Schema::dropIfExists('staffing');
        Schema::dropIfExists('occupation');
    }
}
