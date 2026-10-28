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
        Schema::table('projet_request_details', function (Blueprint $table) {
            if (!Schema::hasColumn('projet_request_details', 'status')) {
                $table->enum('status', ['Unattended', 'Attended'])->default('Unattended')->after('notes');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projet_request_details', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
