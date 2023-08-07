<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountryDestinationsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('country_destinations', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug');
            $table->string('imagename');
            $table->string('duration');
            $table->string('difficulty');
            $table->string('price');
            $table->longText('highlights')->nullable();
            $table->longText('tripintroduction')->nullable();
            $table->integer('frontdest')->default(0);
            $table->integer('topdest')->default(0);
            $table->integer('country_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('country_destinations');
    }
}
