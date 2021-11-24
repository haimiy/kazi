<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('email')->unique()->nullable();
            $table->unsignedBigInteger('role_id');
            $table->string('phone_no')->unique();
            $table->string('address');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('owner', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('person_incharge')->nullable();
            $table->unsignedBigInteger('health_facility_id')->nullable();
            $table->string('signature')->nullable();
            $table->string('designation');
            $table->string('ownership_type');
            $table->timestamps();
        });

        Schema::create('doctor_incharge', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('qualification');
            $table->timestamps();
        });

        Schema::create('registrar', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->unsignedBigInteger('location');
            $table->string('signature');
            $table->timestamps();
        });

        Schema::create('inspectors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('title');
            $table->string('inspector_type');
            $table->unsignedBigInteger('location');
            $table->string('signature');
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
        Schema::dropIfExists('users');
        Schema::dropIfExists('owner');
        Schema::dropIfExists('doctor_incharge');
        Schema::dropIfExists('registrar');
        Schema::dropIfExists('inspectors');
    }
}
