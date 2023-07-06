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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('task');
            $table->timestamp('start_time');
            $table->timestamp('end_time');
            $table->string('group');
            $table->string('visible')->default('yes');
//            $table->index('author_id', 'event_author_idx');
//            $table->unsignedBigInteger('author_id');
//            $table->foreign('author_id', 'event_author_fk')->on('users')->references('id');
            $table->foreignId('author_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
