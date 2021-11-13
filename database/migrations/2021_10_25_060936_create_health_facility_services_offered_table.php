<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilityServicesOfferedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facility_services_offered', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_facility_id');
            $table->unsignedBigInteger('type_of_services_id');
            $table->boolean('is_specified')->default(false);
            $table->string('specified_services')->nullable();
            $table->boolean('have_additional_requirement_question')->default(false);
            $table->string('additional_requirement_question')->nullable();
            $table->string('additional_requirement_answer')->nullable();
            $table->timestamps();
        });

        Schema::create('type_of_services', function (Blueprint $table) {
            $table->id();
            $table->string('name_of_services');
            $table->text('description')->nullable();
            $table->boolean('have_additional_requirement')->default(false);
            $table->string('additional_requirement')->nullable();
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
        Schema::dropIfExists('health_facility_services_offered');
        Schema::dropIfExists('type_of_services');
    }
}
