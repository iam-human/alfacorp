<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('headline');
            $table->string('subheadline');
            $table->string('cta_primary_text');
            $table->string('cta_primary_url');
            $table->string('cta_secondary_text')->nullable();
            $table->string('cta_secondary_url')->nullable();
            $table->string('background_image')->nullable();
            $table->string('stat_1_number')->nullable();
            $table->string('stat_1_label')->nullable();
            $table->string('stat_2_number')->nullable();
            $table->string('stat_2_label')->nullable();
            $table->string('stat_3_number')->nullable();
            $table->string('stat_3_label')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
