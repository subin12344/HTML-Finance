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
      Schema::create('f_customers', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique();
        $table->string('name')->nullable();
        $table->string('number')->nullable();
        $table->text('address')->nullable();
        $table->string('parent_name')->nullable();
        $table->string('number_two')->nullable();
        $table->boolean('status')->default(true);
        $table->timestamps();
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('f_customers');
    }
};
