<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatingsToServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('services', function (Blueprint $table) {
            $table->integer('positive_ratings')->after('landing_url')->unsigned();
            $table->integer('negative_ratings')->after('positive_ratings')->unsigned();
        });

        Schema::create('service_ratings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('service_id')->unsigned();
            $table->foreign('service_id')->references('id')->on('services');
            $table->string('ip');
            $table->string('rating');
            $table->timestamps();
            $table->index(['service_id', 'ip']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('service_ratings');
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['positive_ratings', 'negative_ratings'])->after('landing_url')->unsigned();
        });
    }
}
