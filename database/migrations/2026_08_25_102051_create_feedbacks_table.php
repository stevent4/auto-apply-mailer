<?php
// database/migrations/xxxx_xx_xx_create_feedbacks_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->enum('type', ['feedback', 'report'])->default('feedback');
            $table->string('category')->nullable(); // misal: 'email_gagal', 'upload_cv', 'ui', dll
            $table->string('title');
            $table->text('description');
            $table->string('screenshot_path')->nullable();
            $table->enum('status', ['open', 'in_progress', 'resolved', 'closed'])->default('open');
            $table->foreignId('related_application_id')->nullable()->constrained('application_histories')->nullOnDelete();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('feedbacks');
    }
};
