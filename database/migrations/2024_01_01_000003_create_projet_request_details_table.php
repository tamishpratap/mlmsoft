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
        if (!Schema::hasTable('projet_request_details')) {
            Schema::create('projet_request_details', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('email');
                $table->string('mobile');
                $table->string('company');
                $table->string('country');
                $table->string('website');
                $table->string('plan');
                $table->string('budget');
                $table->text('modules')->nullable();
                $table->text('notes')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projet_request_details');
    }
};
