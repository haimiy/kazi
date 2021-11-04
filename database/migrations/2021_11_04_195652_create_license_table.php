<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLicenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license', function (Blueprint $table) {
            $table->id();
            $table->string('license_no')->nullable();
            $table->string('license_type');
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('health_facility_id');
            $table->date('starting_date');
            $table->timestamps();
        });

        Schema::create('license_histories', function (Blueprint $table) {
            $table->id();
            $table->string('license_no');
            $table->date('date_of_issue');
            $table->date('expiry_date');
            $table->bigInteger('owner_id');
            $table->timestamps();
        });
        Schema::create('license_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('owner_id');
            $table->boolean('is_accepted');
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
        Schema::dropIfExists('license');
        Schema::dropIfExists('license_histories');
        Schema::dropIfExists('application_statuses');
    }
}
