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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('category_id')->nullable();
            $table->string('article');
            $table->string('name');
            $table->text('description')->nullable();
            $table->decimal('price')->default(0);
            $table->decimal('price_cp')->default(0);
            $table->float('count')->default(0);
            $table->string('units')->nullable();
            $table->string('image')->nullable();
            $table->text('specifications')->nullable();
            $table->boolean('main_page')->default(false);

            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
