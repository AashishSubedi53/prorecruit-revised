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
        Schema::create('rating_and_reviews', function (Blueprint $table) {
            $table->id();
            $table->enum('stars', ['1','2','3','4','5'])->default('0');
            $table->longText('comments');
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('professional_id');
            $table->unsignedBigInteger('professional_service_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('professional_id')->references('id')->on('professionals')->onDelete('cascade');
            $table->foreign('professional_service_id')->references('id')->on('professional_services')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rating_and_reviews');
    }
};
