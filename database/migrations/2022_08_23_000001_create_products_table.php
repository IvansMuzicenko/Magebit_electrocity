<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->id("id");
            $table->string('type');
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('connection');
            $table->integer('price');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
        });
        Schema::create('auths', function (Blueprint $table) {
            $table->id("id");
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('email');
            $table->string('password');
            $table->date('updated_at');
            $table->date('created_at');
        });
        Schema::create('orders', function (Blueprint $table) {
            $table->id("id");
            $table->integer('product_id');
            $table->integer('amount');
            $table->integer('customer_id');
            $table->string('customer_address');
            $table->string('customer_email');
            $table->date('order_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
        Schema::dropIfExists('auths');
        Schema::dropIfExists('auth');
    }
};
