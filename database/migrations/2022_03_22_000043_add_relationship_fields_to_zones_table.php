<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToZonesTable extends Migration
{
    public function up()
    {
        Schema::table('zones', function (Blueprint $table) {
            $table->unsignedBigInteger('courier_name_id')->nullable();
            $table->foreign('courier_name_id', 'courier_name_fk_6259550')->references('id')->on('couriers');
            $table->unsignedBigInteger('city_name_id')->nullable();
            $table->foreign('city_name_id', 'city_name_fk_6259551')->references('id')->on('cities');
        });
    }
}
