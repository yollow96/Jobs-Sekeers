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
        Schema::table('users', function (Blueprint $table) {
            $table->string('theme_mode')->after('remember_token')->default(\App\Models\User::LIGHT_MODE)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        if (Schema::hasColumn('users', 'theme_mode')) {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('theme_mode');
            });
        }
    }
};
