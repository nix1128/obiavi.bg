<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviwesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table ->uuid('id')->primary();
            $table->text('content');
            $table->unsignedTinyInteger('rating');

            $table->unsignedBigInteger('ads_id')->index();
            $table->foreign('ads_id')->references('id')->on('Ads');
            $table->unsignedBigInteger('addetails_id')->index()->nullable();
            $table->foreign('addetails_id')->references('id')->on('Ads');
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
        Schema::dropIfExists('reviews');
    }
}
