<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePremisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premises', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('premise_type_id');
            $table->unsignedBigInteger('health_facility_id');
            $table->unsignedInteger('rooms_no')->default(0);
            $table->boolean('is_specified')->default(false);
            $table->string('specified_premises_type')->nullable();
            $table->timestamps();
        });

        Schema::create('premises_type', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description')->nullable();
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
        Schema::dropIfExists('premises');
        Schema::dropIfExists('premises_type');
    }
}
