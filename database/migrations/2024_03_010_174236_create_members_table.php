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
        // Schema::create('members', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama', 100)->nullable();
        //     $table->longText('alamat')->nullable();
        //     $table->string('umur', 3)->nullable();
        //     $table->enum('jenis_kelamin', ['laki-laki', 'perempuan'])->nullable();
        //     $table->string('email', 100)->nullable();
        //     $table->string('no_telp')->nullable();
        //     $table->timestamps();
        //     $table->softDeletes();
        // });

        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 100);
            $table->double('umur', 2, 0);
            $table->string('email', 100)->unique();
            $table->text('alamat');
            $table->foreignId('gender_id')->constrained()->nullable();
            $table->string('no_telp');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
