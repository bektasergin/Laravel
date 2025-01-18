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
        Schema::create('table_productions', function (Blueprint $table) {
            $table->id();
            $table->uuid('guid')->unique();
            $table->string('name',length:150);
            $table->string('description',length:255)->nullable();
            $table->float('price',8.2);
            $table->integer('stock');
            $table->tinyInteger('is_deleted')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_productions');
    }
};

