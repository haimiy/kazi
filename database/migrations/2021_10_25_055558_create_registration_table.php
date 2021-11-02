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
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('nearest_hospital_name')->nullable();;
            $table->string('nearest_hospital_owner')->nullable();;
            $table->string('nearest_hospital_distance')->nullable();;
            $table->string('nearest_hospital_type_of_health_unit')->nullable();
            $table->unsignedBigInteger('service_type_id')->nullable();
            $table->boolean('have_additional_requirement')->nullable()->default(false);
            $table->text('additional_requirement')->nullable();
            $table->string('status')->nullable();;
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
