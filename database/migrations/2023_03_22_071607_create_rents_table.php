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
        Schema::create('rents', function (Blueprint $table) {
            $table->id();
            $table->integer('post_id');
            $table->integer('owner_id');
            $table->integer('tenant_id');
            $table->string('booking_status')->nullable();;
            $table->string('leave_status')->nullable();
            $table->string('transaction_id');
            $table->timestamps('leave_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rents');
    }
};
