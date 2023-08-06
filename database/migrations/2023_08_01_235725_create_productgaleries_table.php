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
        Schema::create('productgaleries', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('product_id');
            $table->string('url_image');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');

            $table->foreign('product_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productgaleries');
    }
};
