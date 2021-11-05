<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTypeOfServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
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
        Schema::dropIfExists('type_of_services');
    }
}
