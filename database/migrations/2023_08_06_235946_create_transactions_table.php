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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('users_id');
            $table->text('address')->nullable();
            $table->string('payment')->default('MANUAL');
            $table->float('total_price')->default(0);
            $table->float('shipping_price')->default(0);
            $table->string('status')->default('PENDING');
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');

            $table->foreign('users_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
