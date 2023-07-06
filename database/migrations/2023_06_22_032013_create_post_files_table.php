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
        Schema::create('post_files', function (Blueprint $table) {
            $table->id();
            $table->string('file')->nullable();
            $table->unsignedBigInteger('post_id');
            $table->index('post_id', 'post_file_idx');
            $table->foreign('post_id', 'post_file_fk')->on('posts')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post_files');
    }
};
