<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('ordersId')->unique();
            $table->foreignId("customer_id")->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('transaction_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('post_code');
            $table->string('address');
            $table->integer('amount');
            $table->string('status');
            $table->string('currency');
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
};
