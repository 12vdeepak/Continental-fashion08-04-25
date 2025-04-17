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
            $table->string('house_number')->nullable()->after('id'); // adjust position if needed
        });
    }

    public function down()
    {
        Schema::table('company_registrations', function (Blueprint $table) {
            $table->dropColumn('house_number');
        });
    }
};
