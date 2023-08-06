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
            $table->uuid('id');
            $table->uuid('productcategory_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('tags')->nullable();
            $table->text('description')->nullable();
            $table->float('price');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');

            $table->foreign('productcategory_id')->references('id')->on('productcategories')->cascadeOnDelete()->cascadeOnUpdate();
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
