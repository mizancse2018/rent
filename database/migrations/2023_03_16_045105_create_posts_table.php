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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId("owner_id")->constraint("posts")->onDelete("cascade");
            $table->string('status')->default('0')->comment('0=pending,1=published');
            $table->string("property_title");
            $table->string("property_type");
            $table->string("division");
            $table->string("district");
            $table->string("area");
            $table->string("thana");
            $table->string("post_code");
            $table->string("road");
            $table->string("price");
            $table->string("holding");
            $table->string("floor");
            $table->string("bed");
            $table->string("bath");
            $table->string("balcony");
            $table->text("description");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
