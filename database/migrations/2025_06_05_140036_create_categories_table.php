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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->enum("name", ["Unkown", "Electronics", "Clothing", "Home & Kitchen", "Beauty & Personal Care", "Sports & Outdoors", "Books", "Toys & Games", "Automotive", "Health & Wellness", "Office Supplies", "Pet Supplies", "Groceries", "Jewelry & Accessories", "Furniture", "Footwear"])->default("Unkown");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
