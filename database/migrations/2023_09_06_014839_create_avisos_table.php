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
        Schema::create('avisos', function (Blueprint $table) {
            $table->string('code', 50)->unique('CODE')->comment('Ref cod');
            $table->string('title');
            $table->string('code_area', 50)->nullable();
            $table->foreign('code_area')
                  ->reference('code')
                  ->on('areas');
            $table->timestamps();
            $table->timestamp('date_expiration');
            $table->timestamp('date_published');
            $table->string('title');
            $table->tinyInteger('state'); // expires - draft - erased - published
            $table->string('url_document')->unique()->comment('Link to Document');
            // Llave llave foránea code_user
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('avisos');
    }
};
