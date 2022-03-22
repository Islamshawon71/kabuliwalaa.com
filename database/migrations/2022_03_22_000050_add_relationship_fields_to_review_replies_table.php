<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToReviewRepliesTable extends Migration
{
    public function up()
    {
        Schema::table('review_replies', function (Blueprint $table) {
            $table->unsignedBigInteger('review_id')->nullable();
            $table->foreign('review_id', 'review_fk_6263178')->references('id')->on('product_reviews');
        });
    }
}
