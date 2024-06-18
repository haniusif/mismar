<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('mismar_orders', function (Blueprint $table) {
            $table->id();
            $table->string('mismar_order_id')->unique();
            $table->string('mismar_customer_phone');
            $table->string('mismar_customer_lat');
            $table->string('mismar_customer_long');
            $table->string('mismar_customer_address');
            $table->string('mismar_car_plate');
            $table->timestamp('mismar_order_time');
            $table->string('mismar_order_status')->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mismar_orders');
    }
};
