<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->string('username')->nullable()->unique()->after('nama');
            $table->string('email')->nullable()->unique()->after('username');
            $table->foreignId('bidang_id')->nullable()->after('no_telp')->constrained('bidang')->nullOnDelete();
            $table->string('password')->nullable()->after('bidang_id');
            $table->rememberToken();
        });
    }

    public function down(): void
    {
        Schema::table('anggota', function (Blueprint $table) {
            $table->dropConstrainedForeignId('bidang_id');
            $table->dropColumn(['username', 'email', 'password', 'remember_token']);
        });
    }
};
