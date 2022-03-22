<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTagsTable extends Migration
{
    public function up()
    {
        Schema::create('product_tags', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
