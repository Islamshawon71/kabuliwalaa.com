<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductProductRequestPivotTable extends Migration
{
    public function up()
    {
        Schema::create('product_product_request', function (Blueprint $table) {
            $table->unsignedBigInteger('product_request_id');
            $table->foreign('product_request_id', 'product_request_id_fk_6263194')->references('id')->on('product_requests')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id', 'product_id_fk_6263194')->references('id')->on('products')->onDelete('cascade');
        });
    }
}
