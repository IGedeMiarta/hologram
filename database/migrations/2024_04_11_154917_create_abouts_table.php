<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('banner_img');
            $table->string('title');
            $table->longText('desc');
            $table->string('banefit_img');
            $table->string('service_title');
            $table->string('service_sub_title');
            $table->string('testi_title');
            $table->string('testi_sub_title');
            $table->string('quote');
            $table->string('quote_by_name');
            $table->string('quote_by_title');
            $table->string('quote_by_img');
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
        Schema::dropIfExists('abouts');
    }
}
