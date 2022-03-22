<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('product_requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->longText('customer_note')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
