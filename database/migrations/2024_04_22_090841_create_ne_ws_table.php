<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ne_ws', function (Blueprint $table) {
            $table->id();
            $table->string('title',255);
            $table->string('content');
            $table->dateTime('datetime');

            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ne_ws');
    }
};
