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
        Schema::create('sections_conferences', function (Blueprint $table) {
            $table->unsignedBigInteger('section_id')->autoIncrement();
            $table->string('name', 50);
            $table->unsignedBigInteger('conference_id');
            $table->date('date_of_start');
            $table->timestamps();

            $table->foreign('conference_id')->references('id')
                ->on('conferences')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sections_conferences');
    }
};
