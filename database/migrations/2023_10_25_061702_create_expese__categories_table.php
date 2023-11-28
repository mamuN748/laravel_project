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
        Schema::create('expese__categories', function (Blueprint $table) {
            $table->bigIncrements('Incate_id');
            $table->string('Expcate_name',50)->unique();
            $table->string('Expcate_remarks',200)->nullable();
            $table->integer('Expcate_creator')->nullable();
            $table->string('Expcate_slug',30)->nullable();
            $table->integer('Expcate_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expese__categories');
    }
};
