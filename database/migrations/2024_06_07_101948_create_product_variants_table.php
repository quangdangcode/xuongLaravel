<?php

use App\Models\product;
use App\Models\productColor;
use App\Models\productSize;
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
        Schema::create('product_variants', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(product::class)->constrained();
            $table->foreignIdFor(productSize::class)->constrained();
            $table->foreignIdFor(productColor::class)->constrained();
            $table->unsignedBigInteger('quatity')->default(0);
            $table->string('image')->nullable();
            $table->unique(['product_id', 'product_size_id', 'product_color_id'], 'product_variant_unique');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_variants');
    }
};
