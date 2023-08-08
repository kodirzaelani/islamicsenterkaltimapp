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
        Schema::create('transactionitems', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('users_id');
            $table->uuid('products_id');
            $table->uuid('transactions_id');
            $table->bigInteger('quantity');
            $table->timestamps();
            $table->primary('id');

            $table->foreign('users_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('products_id')->references('id')->on('products')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreign('transactions_id')->references('id')->on('transactions')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactionitems');
    }
};
