<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToOrderPaymentsTable extends Migration
{
    public function up()
    {
        Schema::table('order_payments', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->nullable();
            $table->foreign('order_id', 'order_fk_6259647')->references('id')->on('orders');
            $table->unsignedBigInteger('payment_id')->nullable();
            $table->foreign('payment_id', 'payment_fk_6259648')->references('id')->on('payments');
        });
    }
}
