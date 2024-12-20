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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_proposal_id');
            $table->text('title');
            $table->text('description');
            $table->text('product_src');
            $table->text('physical_sample_status')->nullable();
            $table->text('product_category');
            $table->boolean('is_complete');
            $table->boolean('is_validated');
            $table->text('to_market');
            $table->date('publish_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
