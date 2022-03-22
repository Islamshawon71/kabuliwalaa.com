<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToCitiesTable extends Migration
{
    public function up()
    {
        Schema::table('cities', function (Blueprint $table) {
            $table->unsignedBigInteger('courier_name_id')->nullable();
            $table->foreign('courier_name_id', 'courier_name_fk_6259542')->references('id')->on('couriers');
        });
    }
}
