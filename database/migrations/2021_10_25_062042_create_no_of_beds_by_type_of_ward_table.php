<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNoOfBedsByTypeOfWardTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('no_of_beds_by_type_of_ward', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_of_ward_id');
            $table->unsignedInteger('no_of_beds');
            $table->boolean('is_specified')->default(false);
            $table->string('specified_ward_type')->nullable();
            $table->unsignedBigInteger('health_facility_id');
            $table->timestamps();
        });

        Schema::create('type_of_ward', function (Blueprint $table) {
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
        Schema::dropIfExists('no_of_beds_by_type_of_ward');
        Schema::dropIfExists('type_of_ward');
    }
}
