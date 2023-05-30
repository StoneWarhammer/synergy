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
        Schema::create('rates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('answer_author_id');
            $table->index('answer_author_id', 'rate_answer_author_idx');
            $table->foreign('answer_author_id', 'rate_answer_author_fk')->on('users')->references('id');

            $table->unsignedBigInteger('event_id');
            $table->index('event_id', 'rate_event_idx');
            $table->foreign('event_id', 'rate_event_fk')->on('event')->references('id');
            $table->integer('rate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rates');
    }
};
