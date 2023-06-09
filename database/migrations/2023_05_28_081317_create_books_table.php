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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('country_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('class_room_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('subject_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('detail')->nullable();
            $table->boolean('isPaid');
            $table->integer('price')->nullable();
            $table->integer('selling_price')->nullable();
            $table->string('lang');
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_path')->nullable();
            $table->string('dummy_pdf')->nullable();
            $table->string('book_pdf')->nullable();
            $table->boolean('is_ebook')->default(true);
            $table->boolean('is_featured')->default(false);
            $table->string('format')->nullable();
            $table->string('dimension')->nullable();
            $table->string('publication_date')->nullable();
            $table->string('total_pages')->nullable();

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
        Schema::dropIfExists('books');
    }
};
