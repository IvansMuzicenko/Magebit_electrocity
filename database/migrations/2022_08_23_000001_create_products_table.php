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
            $table->string('brand');
            $table->string('model');
            $table->string('color');
            $table->string('connection');
            $table->string('price');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
        });
        Schema::create('auth', function (Blueprint $table) {
            $table->id("id");
            $table->string('firstname');
            $table->string('lastname');
            $table->string('address');
            $table->string('email');
            $table->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('products');
        Schema::dropIfExists('auth');
    }
};
