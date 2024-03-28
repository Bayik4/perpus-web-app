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
        Schema::create('bukus', function (Blueprint $table) {
            $table->id();
            $table->string('kode_buku', 10);
            $table->text('sampul')->nullable()->default('nosampul.png');
            $table->string('judul_buku', 100);
            $table->string('jenis_buku', 100)->nullable()->default('-');
            $table->string('penulis', 100);
            $table->string('penerbit', 100);
            $table->text('cetakan')->nullable()->default('-');
            $table->string('tebal_buku', 50)->nullable()->default('-');
            $table->string('dimensi_buku', 50)->nullable()->default('-');
            $table->string('isbn', 50);
            $table->text('sinopsis')->nullable()->default('-');
            $table->foreignId('rak_id')->constrained();
            $table->double('jumlah_buku', 100, 0)->snullable()->defoult(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
