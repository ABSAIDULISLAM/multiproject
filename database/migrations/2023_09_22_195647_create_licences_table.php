<?php

use App\Models\District;
use App\Models\Kachari;
use App\Models\LicenceType;
use App\Models\Mouza;
use App\Models\Station;
use App\Models\Upzila;
use App\Models\User;
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
        if (!Schema::hasTable('licences')) {
            Schema::create('licences', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Kachari::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(Station::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(LicenceType::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
                $table->string('plot_no')->nullable();
                $table->string('jl_no')->nullable();
                $table->string('dag_no')->nullable();
                $table->foreignIdFor(District::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(Upzila::class)->constrained()->cascadeOnDelete();
                $table->foreignIdFor(Mouza::class)->constrained()->cascadeOnDelete();
                $table->string('licence_no');
                $table->string('land_height')->nullable();
                $table->string('land_width')->nullable();
                $table->string('land_total');
                $table->string('validity');
                $table->string('south')->nullable();
                $table->string('north')->nullable();
                $table->string('east')->nullable();
                $table->string('west')->nullable();
                $table->enum('status',['active','pending'])->default('pending');
                $table->timestamps();
                $table->softDeletes();
            });
        };

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licences');
    }
};
