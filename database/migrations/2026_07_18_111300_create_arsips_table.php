<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('arsips', function (Blueprint $table) {
            if (!Schema::hasColumn('arsips', 'judul')) {
                $table->string('judul')->after('id');
            }

            if (!Schema::hasColumn('arsips', 'deskripsi')) {
                $table->text('deskripsi')->nullable()->after('judul');
            }

            if (!Schema::hasColumn('arsips', 'file_path')) {
                $table->string('file_path')->after('deskripsi');
            }

            if (!Schema::hasColumn('arsips', 'original_name')) {
                $table->string('original_name')->after('file_path');
            }

            if (!Schema::hasColumn('arsips', 'mime_type')) {
                $table->string('mime_type')->nullable()->after('original_name');
            }

            if (!Schema::hasColumn('arsips', 'ukuran')) {
                $table->unsignedBigInteger('ukuran')->nullable()->after('mime_type');
            }
        });
    }

    public function down(): void
    {
        Schema::table('arsips', function (Blueprint $table) {
            $columns = ['judul', 'deskripsi', 'file_path', 'original_name', 'mime_type', 'ukuran'];

            foreach ($columns as $column) {
                if (Schema::hasColumn('arsips', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
