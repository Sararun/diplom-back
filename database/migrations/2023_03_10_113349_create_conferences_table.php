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
        Schema::create('conferences', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('name', 50)->unique();
            $table->unsignedBigInteger('organizers_id');
            $table->string('location', 50);
            $table->date('start_date');
            $table->date('end_date');

            $table->timestamps();

            $table->foreign('organizers_id')->references('organizers_id')
                ->on('organizers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conferences');
    }
};
