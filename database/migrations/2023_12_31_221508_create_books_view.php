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
        DB::statement("
        CREATE VIEW books_view AS
        SELECT
            a.name AS author_name,
            GROUP_CONCAT(DISTINCT b.title ORDER BY b.title SEPARATOR ', ') AS books_by_author,
            GROUP_CONCAT(DISTINCT s.description ORDER BY s.description SEPARATOR ', ') AS subjects_by_author
        FROM
            authors a
        JOIN
            book_authors ba ON a.id = ba.author_id
        JOIN
            books b ON ba.book_id = b.id
        LEFT JOIN
            book_subjects bs ON b.id = bs.book_id
        LEFT JOIN
            subjects s ON bs.subject_id = s.id
        GROUP BY
            a.name
    ");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW IF EXISTS books_view');
    }
};