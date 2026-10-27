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
        Schema::create('production_outputs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('production_order_id')->constrained('production_orders');
            $table->foreignId('product_variant_id')->constrained('product_variants');
            $table->integer('quantity')->default(0);
            $table->integer('defective_quantity')->default(0);
            $table->date('produced_date');
            $table->timestamps();
            $table->uniqe(['production_order_id', 'product_varian_id']);
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('production_outputs');
    }
};
