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
            $table->integer('category_id');
            $table->integer('color_id');
            $table->integer('size_id');
            $table->string('product_name');
            $table->integer('brand_id');
            $table->longText('short_description');
            $table->longText('description');
            $table->string('price');
            $table->string('qty');
            $table->string('status');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->string('lead_time');
            $table->integer('is_featured');
            $table->string('is_discounted');
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
        Schema::dropIfExists('products');
    }
}
