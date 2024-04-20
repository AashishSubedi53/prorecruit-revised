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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('professionalService_id');
            $table->unsignedBigInteger('professional_id');
            $table->unsignedBigInteger('payment_id');
            $table->string('bookingDate');
            $table->string('bookingTime');
            $table->string('bookingAddress');
            $table->string('city');
            $table->string('pin_code');
            $table->longText('additionalDetails');
            $table->enum('order_status', ['Completed', 'Awaiting Completion']);
            // order_date
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('professionalService_id')->references('id')->on('professional_services')->onDelete('cascade');
            $table->foreign('professional_id')->references('id')->on('professionals')->onDelete('cascade');
            $table->foreign('payment_id')->references('id')->on('payments')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
