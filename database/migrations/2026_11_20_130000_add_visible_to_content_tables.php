<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private array $tables = [
        'skills',
        'projects',
        'experiences',
        'educations',
        'testimonials',
    ];

    public function up(): void
    {
        foreach ($this->tables as $tableName) {
            if (! Schema::hasColumn($tableName, 'visible')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->boolean('visible')->default(true);
                });
            }
        }
    }

    public function down(): void
    {
        foreach ($this->tables as $tableName) {
            if (Schema::hasColumn($tableName, 'visible')) {
                Schema::table($tableName, function (Blueprint $table) {
                    $table->dropColumn('visible');
                });
            }
        }
    }
};
