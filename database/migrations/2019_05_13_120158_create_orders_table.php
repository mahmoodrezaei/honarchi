<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('address_id');
            $table->unsignedInteger('coupon_id');
            $table->unsignedInteger('customer_id');
            $table->unsignedInteger('payment_id');
            $table->unsignedInteger('shipment_id');
            $table->unsignedInteger('accounting_id');

            $table->string('number');
            $table->string('notes')->nullable();
            $table->string('state');
            $table->string('checkout_state');
            $table->string('checkout_completed_at')->nullable();
            $table->integer('items_total');

            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('coupon_id')->references('id')->on('coupons');
            $table->foreign('customer_id')->references('id')->on('users');
            $table->foreign('payment_id')->references('id')->on('payments');
            $table->foreign('shipment_id')->references('id')->on('shipments');
            $table->foreign('accounting_id')->references('id')->on('accountings');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
