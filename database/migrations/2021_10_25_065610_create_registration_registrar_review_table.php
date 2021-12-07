<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationRegistrarReviewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registration_registrar_review', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('registration_id');
            $table->enum('review_status', ['approved', 'rejected']);
//            $table->dateTime('starting_date_of_operation');
//            $table->dateTime('ending_date_of_operation');
            $table->unsignedBigInteger('registrar_id');
            $table->enum('review_type', ['fixed Review', 'Appeal Review']);
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
        Schema::dropIfExists('registration_registrar_review');
    }
}
