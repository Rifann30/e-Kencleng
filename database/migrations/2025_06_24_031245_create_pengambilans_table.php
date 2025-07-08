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
        Schema::create('pengambilans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('created_by')->onDelete('set null');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->Integer('jml_dana');
            $table->Integer('jml_pengambilan');
            $table->date('tanggal');
            $table->string('periode');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengambilans');
    }
};
