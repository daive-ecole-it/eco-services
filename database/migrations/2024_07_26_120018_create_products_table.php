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
                $table->string('title')->nullable();
                $table->longText('description')->nullable();
                $table->string('image')->nullable();
                $table->decimal('price', 8, 2)->nullable(); // Assuming price is a decimal with 2 decimal places
                $table->string('category')->nullable();
                $table->integer('quantity')->nullable(); // Assuming quantity is an integer
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
