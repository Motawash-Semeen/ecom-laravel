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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('brand_id');
            $table->integer('category_id');
            $table->integer('subcategory_id');
            $table->integer('subsubcategory_id');
            $table->string('product_name_en');
            $table->string('product_name_bn');
            $table->string('product_slug_en');
            $table->string('product_slug_bn');
            $table->string('product_code');
            $table->string('product_qty');
            $table->string('product_tags_en');
            $table->string('product_tags_bn');
            $table->string('product_size_en')->nullable();
            $table->string('product_size_bn')->nullable();
            $table->string('product_color_en');
            $table->string('product_color_bn');
            $table->string('selling_price');
            $table->string('discount_price')->nullable();
            $table->string('short_descp_en');
            $table->string('short_descp_bn');
            $table->string('long_descp_en');
            $table->string('long_descp_bn');
            $table->string('product_thambnail');
            $table->integer('hot_deals')->nullable()->default(0);
            $table->integer('featured')->nullable()->default(0);
            $table->integer('special_offer')->nullable()->default(0);
            $table->integer('special_deals')->nullable()->default(0);
            $table->integer('status')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
