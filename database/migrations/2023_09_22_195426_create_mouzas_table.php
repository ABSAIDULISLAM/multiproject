<?php

use App\Models\District;
use App\Models\Upzila;
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
        Schema::create('mouzas', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(District::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Upzila::class)->constrained()->cascadeOnDelete();
            $table->string('mouza');
            $table->timestamps();
            $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mouzas');
    }
};
