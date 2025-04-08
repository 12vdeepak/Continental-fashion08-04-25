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
        Schema::table('products', function (Blueprint $table) {
            // Drop the existing column (if it's not the correct type)
            $table->dropColumn('fabric_quality');

            // Add the new foreign key column
            $table->unsignedBigInteger('fabric_id')->nullable()->after('article_id');

            // Define the foreign key constraint
            $table->foreign('fabric_id')->references('id')->on('fabrics')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Rollback changes if necessary
            $table->dropForeign(['fabric_id']);
            $table->dropColumn('fabric_id');
            $table->string('fabric_quality')->nullable()->after('article_id'); // Restore previous column
        });
    }
};
