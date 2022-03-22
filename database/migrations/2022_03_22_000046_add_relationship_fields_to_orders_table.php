<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrdersTable extends Migration
{
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('courier_id')->nullable();
            $table->foreign('courier_id', 'courier_fk_6259612')->references('id')->on('couriers');
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id', 'city_fk_6259613')->references('id')->on('cities');
            $table->unsignedBigInteger('zone_id')->nullable();
            $table->foreign('zone_id', 'zone_fk_6259614')->references('id')->on('zones');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id', 'user_fk_6259623')->references('id')->on('users');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id', 'customer_fk_6259629')->references('id')->on('customers');
        });
    }
}
