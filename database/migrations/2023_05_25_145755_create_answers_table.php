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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->text('answer')->nullable();
            $table->unsignedBigInteger('answer_author_id');
            $table->index('answer_author_id', 'answer_author_idx');
            $table->foreign('answer_author_id', 'answer_author_fk')->on('users')->references('id');
            $table->unsignedBigInteger('answer_event_id');
            $table->index('answer_event_id', 'answer_event_idx');
            $table->foreign('answer_event_id', 'answer_event_fk')->on('events')->references('id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
