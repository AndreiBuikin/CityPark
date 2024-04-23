<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('souvenirs', function (Blueprint $table) {
            $table->id();
            $table->string('name',32);
            $table->string('description', 255);
            $table->decimal('price',12,2);

            $table->foreignId('category_souvenir_id')->constrained('category_souvenirs','id')->onUpdate('cascade');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('souvenirs');
    }
};
