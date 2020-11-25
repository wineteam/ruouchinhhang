<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('codeProduct')->unique();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('thumbnail')->nullable();
            $table->integer('price');
            $table->text('detail')->nullable();
            $table->integer('discount')->nullable();
            $table->string('nation');
            $table->text('description')->nullable();
            $table->integer('view')->default(0);
            $table->integer('bought')->default(0);
            $table->unsignedBigInteger('language_id')->nullable();
            $table->enum('is_published',['0','1']);
            $table->enum('especially',['0','1']);
            $table->integer('amount')->default(0);
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('language_id')->references('id')->on('language_switches')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
