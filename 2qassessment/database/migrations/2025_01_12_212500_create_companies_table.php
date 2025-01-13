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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false); // Company name, required
            $table->string('email')->unique(); //Company email, unique
            $table->string('logo')->nullable()->check('LENGTH(logo) >= 100'); // Logo with size constraint
            $table->string('website')->unique(); // Website link, unique
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
