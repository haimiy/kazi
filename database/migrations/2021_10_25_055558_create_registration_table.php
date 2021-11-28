<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_of_health_unit_id');
            $table->string('type_of_health_unit_specified')->nullable();
            $table->unsignedBigInteger('authority_responsible_id');
            $table->string('authority_responsible_specified')->nullable();
            $table->date('starting_operation_date');
            $table->unsignedBigInteger('health_facility_id')->nullable();
            $table->string('nearest_hospital_name')->nullable();;
            $table->string('nearest_hospital_owner')->nullable();;
            $table->string('nearest_hospital_distance')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('nearest_hospital_type_of_health_unit')->nullable();
            $table->enum('status', ['Pending', 'Accepted', 'Rejected', 'Approved'])->default('Pending')->nullable();;
            $table->string('application_ref_no')->nullable();
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
        Schema::dropIfExists('registration');
    }
}
