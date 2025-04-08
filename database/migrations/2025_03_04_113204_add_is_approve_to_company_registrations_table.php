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
        Schema::table('company_registrations', function (Blueprint $table) {
            $table->boolean('is_approve')->default(0)->after('password'); // Add is_approve column after password
        });
    }

    public function down()
    {
        Schema::table('company_registrations', function (Blueprint $table) {
            $table->dropColumn('is_approve'); // Rollback if needed
        });
    }
};
