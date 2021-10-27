<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingStatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('building_parts_id');
            $table->unsignedBigInteger('health_facility_id');
            $table->text('comments');
            $table->enum('state', ['good', 'average', 'bad']);
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
        Schema::dropIfExists('building_status');
    }
}
