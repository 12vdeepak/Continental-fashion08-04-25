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
        Schema::table('company_registrations', function (Blueprint $table) {
            $table->enum('price_category_type', ['1', '2', '3', '4'])->after('customer_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('company_registrations', function (Blueprint $table) {
            //
        });
    }
};
