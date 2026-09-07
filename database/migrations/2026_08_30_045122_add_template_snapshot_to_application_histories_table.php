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
        Schema::table('application_histories', function (Blueprint $table) {
            // Referensi ke template yang dipakai (histori, boleh null kalau template dihapus)
            $table->foreignId('email_template_id')
                ->nullable()
                ->after('user_id')
                ->constrained('templates')
                ->nullOnDelete();

            $table->foreignId('cover_letter_template_id')
                ->nullable()
                ->after('email_template_id')
                ->constrained('templates')
                ->nullOnDelete();

            // Snapshot hasil render — isi yang BENAR-BENAR dikirim, tidak berubah meski template diedit
            $table->longText('email_body')->nullable()->after('subjek');
            $table->longText('cover_letter_body')->nullable()->after('email_body');

            // Path file PDF hasil generate cover letter (untuk tahap berikutnya)
            $table->string('cover_letter_pdf_path')->nullable()->after('cover_letter_body');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('application_histories', function (Blueprint $table) {
            $table->dropForeign(['email_template_id']);
            $table->dropForeign(['cover_letter_template_id']);
            $table->dropColumn([
                'email_template_id',
                'cover_letter_template_id',
                'email_body',
                'cover_letter_body',
                'cover_letter_pdf_path',
            ]);
        });
    }
};
