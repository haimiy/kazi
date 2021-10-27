<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHealthFacilityInspectionCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('health_facility_inspection_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('health_facility_inspection_id');
            $table->text('comments');
            $table->unsignedBigInteger('inspector_guidelines_question_id');
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
        Schema::dropIfExists('health_facility_inspection_comments');
    }
}
