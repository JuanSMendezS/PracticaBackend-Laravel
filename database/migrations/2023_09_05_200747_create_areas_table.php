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
        Schema::create('areas', function (Blueprint $table) {
            $table->string('code',50)->unique('CODE')->comment('Ref code');            
            $table->string('name')->comment('Name of Area');            
            $table->timestamps();
            $table->tinyInteger('state');
            // Llave foránea
            $table->string('parent_code', 50)->nullable();
            $table->foreign('parent_code')
                  ->reference('code')
                  ->on('areas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
