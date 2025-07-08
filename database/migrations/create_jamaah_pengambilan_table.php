<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jamaah_pengambilan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengambilan_id')->constrained('pengambilans')->onDelete('cascade');
            $table->foreignId('jamaah_id')->constrained('jamaahs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jamaah_pengambilan');
    }
};
