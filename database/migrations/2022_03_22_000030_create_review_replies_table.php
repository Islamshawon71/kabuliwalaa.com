<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewRepliesTable extends Migration
{
    public function up()
    {
        Schema::create('review_replies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('reply');
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }
}
