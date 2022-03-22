<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('order_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('message');
            $table->string('status');
            $table->timestamps();
        });
    }
}
