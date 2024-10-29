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
        Schema::create('enterprises', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type');
            $table->string('sector');
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->text('direction')->nullable();
            $table->text('description')->nullable();
            $table->boolean('active')->default(true); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('enterprises');
    }
};
