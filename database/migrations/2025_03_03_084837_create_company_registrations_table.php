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
        Schema::create('company_registrations', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('street');
            $table->string('zip_code');
            $table->string('city');
            $table->string('country');
            $table->string('phone_number');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->string('first_name');
            $table->string('last_name');
            $table->string('supervisory')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('vat_id_number');
            $table->string('business_registration_file')->nullable();
            $table->text('note')->nullable();
            $table->boolean('terms_accepted')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('company_registrations');
    }
};
