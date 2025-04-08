<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('product_image_size', function (Blueprint $table) {
            $table->integer('quantity')->default(0); // New column for quantity
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_image_size', function (Blueprint $table) {
            //
        });
    }
};
