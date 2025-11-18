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
        Schema::table('budget_states', function (Blueprint $table) {
            $table->string('current_month', 7)->nullable()->after('user_id'); // Format: '2025-01'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budget_states', function (Blueprint $table) {
            $table->dropColumn('current_month');
        });
    }
};
