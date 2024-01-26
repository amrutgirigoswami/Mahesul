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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('mobile_no')->nullable();
            $table->string('village_name')->nullable();
            $table->string('taluka_name')->nullable();
            $table->string('district_name')->nullable();
            $table->string('full_address')->nullable();
            $table->string('pincode')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('profile_image')->nullable();
            $table->string('year')->nullable();
            $table->tinyInteger('role_as')->default(0)->comment('1-admin 0-user');
            $table->tinyInteger('status')->default(0)->comment('1-deactive 0-active');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
