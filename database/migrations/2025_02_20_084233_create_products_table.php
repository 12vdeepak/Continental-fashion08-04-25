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
            $table->foreignId('category_id')->constrained();
            $table->foreignId('sub_category_id')->constrained('sub_categories');
            $table->string('product_name');
            $table->text('product_details')->nullable();
            $table->foreignId('material_id')->constrained();
            $table->foreignId('weight_id')->constrained('weights');
            $table->foreignId('article_id')->constrained('articles');
            $table->string('fabric_quality')->nullable();
            $table->integer('pack_poly')->nullable();
            $table->foreignId('country_id')->constrained('countries');
            $table->string('manufacturer_name')->nullable();
            $table->integer('add_stoke');
            $table->decimal('category_1_price', 10, 2)->nullable();
            $table->decimal('category_2_price', 10, 2)->nullable();
            $table->decimal('category_3_price', 10, 2)->nullable();
            $table->decimal('category_4_price', 10, 2)->nullable();
            $table->decimal('actual_product_price', 10, 2);
            $table->enum('sale', ['yes', 'no'])->default('no');
            $table->integer('sale_percentage')->nullable();
            $table->foreignId('promotion_id')->nullable()->constrained('promotionals');
            $table->foreignId('wear_id')->nullable()->constrained('wears');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });

        // Pivot tables for many-to-many relationships
        Schema::create('product_size', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('size_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_color', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('color_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_brand', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->foreignId('brand_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->boolean('is_primary')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_images');
        Schema::dropIfExists('product_brand');
        Schema::dropIfExists('product_color');
        Schema::dropIfExists('product_size');
        Schema::dropIfExists('products');
    }
};
