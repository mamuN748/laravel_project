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
        Schema::create('income_categories', function (Blueprint $table) {
            $table->bigIncrements('Incate_id');
            $table->string('Incate_name',50)->unique();
            $table->string('Incate_remarks',200)->nullable();
            $table->integer('Incate_creator')->nullable();
            $table->string('Incate_slug',30)->nullable();
            $table->integer('Incate_status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_categories');
    }
};
