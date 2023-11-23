<?php

use App\Models\Licence;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use League\CommonMark\Extension\Table\Table;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if(! DB::table('licence_holders')){
            Schema::create('licence_holders', function (Blueprint $table) {
                $table->id();
                $table->foreignIdFor(Licence::class)->constrained()->cascadeOnDelete();
                $table->string('licence_holder');
                $table->string('father_name');
                $table->string('address');
                $table->string('nid');
                $table->string('date_of_birth');
                $table->string('mobile')->nullable();
                $table->text('image');
                $table->foreign('licences_id')->references('id')->on('licences')->onDelete('cascade');
                $table->timestamps();
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('licence_holders');
    }
};
