<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name',32);
            $table->string('surname',32);
            $table->string('patronymic',32)->nullable();
            $table->string('password', 255);
            $table->string('login', 255)->unique();

            $table->string('token')->nullable()->unique();
            $table->foreignId('role_id')->constrained('roles','id')->onUpdate('cascade');
            $table->string('photo')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
