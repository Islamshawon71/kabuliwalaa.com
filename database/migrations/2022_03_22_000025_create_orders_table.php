<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('wpid')->nullable();
            $table->string('invoice')->unique();
            $table->string('memo')->nullable();
            $table->integer('delivery');
            $table->string('discount_type')->nullable();
            $table->integer('discount')->nullable();
            $table->integer('total');
            $table->integer('paid')->nullable();
            $table->date('confirm_date')->nullable();
            $table->date('delivery_date')->nullable();
            $table->date('complete_date')->nullable();
            $table->string('status');
            $table->string('note')->nullable();
            $table->timestamps();
        });
    }
}
