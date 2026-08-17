<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('templates', function (Blueprint $table) {
            $table->id();

            // NULL = template bawaan sistem
            // terisi = template milik user
            $table->foreignId('user_id')
                ->nullable()
                ->constrained()
                ->nullOnDelete();

            $table->string('name');
            $table->string('type', 20); // email / pdf
            $table->string('category', 50)->nullable();
            $table->string('subject')->nullable();
            $table->longText('body');
            $table->boolean('is_default')->default(false);

            $table->timestamps();

            $table->index(['type', 'category']);
            $table->index(['user_id', 'type']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('templates');
    }
};
