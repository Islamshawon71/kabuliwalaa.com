<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCouriersTable extends Migration
{
    public function up()
    {
        Schema::create('couriers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('courier_name');
            $table->boolean('city_available')->default(0)->nullable();
            $table->boolean('zone_available')->default(0)->nullable();
            $table->string('delivery_charge')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
