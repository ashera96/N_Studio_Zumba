<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->integer('id');
            $table->string('month');
            $table->integer('year');
            $table->integer('totalclasses');
            $table->integer('attendanceclasses');
            $table->double('percentage');
            $table->primary(['id', 'month','year']);
            //$table->foreign('id')->references('id')->on('system_users');
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
        Schema::dropIfExists('attendances');
    }
}
