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
            $table->json('extra_budget_history')->nullable()->after('expenses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('budget_states', function (Blueprint $table) {
            $table->dropColumn('extra_budget_history');
        });
    }
};
