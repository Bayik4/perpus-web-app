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
        Schema::create('pinjams', function (Blueprint $table) {
            $table->id();
            $table->foreignId('buku_id')->constrained();
            $table->foreignId('member_id')->costrained();
            $table->foreignId('user_id')->constrained();
            $table->date('tanggal_pinjam')->default(now());
            $table->date('tanggal_kembali');
            $table->double('jumlah_dipinjam', 1, 0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjams');
    }
};
