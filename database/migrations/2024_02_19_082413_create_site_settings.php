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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id('id');
            $table->string('phonenumber')->nullable();
            $table->string('address')->nullable();
            $table->string('email')->nullable();
            $table->string('instagram')->nullable();
            $table->string('tiktok')->nullable();
            $table->string('facebook')->nullable();
            $table->text('payment_modes')->nullable(); // If storing as JSON, you might want to adjust this
            $table->string('copyright')->nullable();
            $table->text('about_us_description')->nullable();
            $table->string('about_us_image')->nullable();
            $table->string('logo')->nullable();
            $table->string('homepage_banner')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
