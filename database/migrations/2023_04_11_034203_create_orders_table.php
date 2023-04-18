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
            $table->foreignId('buyer_id')->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('cashier_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('place_id')->nullable()->constrained()->onUpdate('cascade')->onDelete('cascade');
            $table->string('proof_of_payment')->nullable();
            $table->bigInteger('total')->default(0);
            $table->string('note')->nullable();
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
