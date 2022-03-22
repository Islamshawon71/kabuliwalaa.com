<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSmsNotificationsTable extends Migration
{
    public function up()
    {
        Schema::create('sms_notifications', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('number');
            $table->string('message');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
