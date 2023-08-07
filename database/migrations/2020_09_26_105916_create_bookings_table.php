<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('bookeddate');
            $table->integer('nop');
            $table->string('bookedname');
            $table->string('bookedemail');
            $table->string('bookedcountry');
            $table->bigInteger('bookedphone');
            $table->longText('message');
            $table->string('status')->default('pending');
            $table->integer('cd_id');
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
        Schema::dropIfExists('bookings');
    }
}
