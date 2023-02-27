<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('gender_id');
            $table->string('religion_id');
            $table->string('marital_status_id');
            $table->string('nationality_id');
            $table->string('fullname');
            $table->string('image');
            $table->string('pob');
            $table->date('dob');
            $table->string('address');
            $table->string('position');
            $table->string('division');
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
        Schema::dropIfExists('employees');
    }
}
