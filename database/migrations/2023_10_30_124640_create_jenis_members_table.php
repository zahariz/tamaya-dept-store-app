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
        Schema::create('jenis_members', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jenis', 40);
            $table->bigInteger('expired_member', 100);
            $table->integer('bayar_iuran', 100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_members');
    }
};
