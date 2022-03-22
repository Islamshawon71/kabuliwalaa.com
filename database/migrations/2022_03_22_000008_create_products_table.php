<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('code')->nullable();
            $table->decimal('regular_price', 15, 2)->nullable();
            $table->string('sale_price')->nullable();
            $table->longText('description')->nullable();
            $table->string('priority')->nullable();
            $table->string('status')->nullable();
            $table->longText('seo_content')->nullable();
            $table->timestamps();
        });
    }
}
