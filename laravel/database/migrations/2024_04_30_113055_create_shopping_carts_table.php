<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
       Schema::create('shopping_carts', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->unsignedBigInteger('product_id');
        $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        $table->unsignedBigInteger('user_id');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
        $table->string('size')->default('M'); // Thêm trường size
        $table->integer('quantity'); // Loại bỏ auto_increment và primary key
        $table->double('price');
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shopping_carts');
    }
};
