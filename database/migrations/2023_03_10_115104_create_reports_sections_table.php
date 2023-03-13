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
        Schema::create('reports_sections', function (Blueprint $table) {
            $table->id('section_id')->autoIncrement();
            $table->string('name', '50');
            $table->unsignedBigInteger('member_id');
            $table->dateTime('time_start', 0);
            $table->timestamps();

            $table->foreign('section_id')->references('section_id')
                ->on('sections_conferences')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('member_id')->references('member_id')
                ->on('members')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports_sections');
    }
};
