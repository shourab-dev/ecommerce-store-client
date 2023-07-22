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
        Schema::create('header_seetings', function (Blueprint $table) {
            $table->id();
            $table->string('logo')->nullable();
            $table->json('phone')->nullable();
            $table->json('email')->nullable();
            $table->boolean('is_question')->default(false);
            $table->
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
        Schema::dropIfExists('header_seetings');
    }
};
