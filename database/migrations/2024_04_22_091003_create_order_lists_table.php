<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('order_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');

            $table->foreignId('cart_id')->constrained('carts','id')->onUpdate('cascade');
            $table->foreignId('ticket_id')->constrained('tickets','id')->onUpdate('cascade');
            $table->foreignId('user_id')->constrained('users','id')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('order_lists');
    }
};
